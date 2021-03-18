<?php
namespace App\Controllers;

use App\Models\NounouModel;
use Core\Controller\Controller;
use Public\inc\Class\VerifForm;

class NounouController extends Controller {

    public function __construct()
    {
        $this->nounouModel = new NounouModel();
    }

    public function register($data) {
        $errors = [];

        if(!empty($data['email-registration-nounou'])){
            $user = [];
            $ValideForm = new VerifForm();

            $user['email'] = $ValideForm->cleanXSS($data['email-registration-nounou']);
            $user['last_name'] = $ValideForm->cleanXSS($data['lastname-registration-nounou']);
            $user['first_name'] = $ValideForm->cleanXSS($data['firstname-registration-nounou']);
            $user['genre'] = $ValideForm->cleanXSS($data['genre-registration-nounou']);
            $user['password'] = $ValideForm->cleanXSS($data['password-registration-nounou']);
            $passwordConfirm = $ValideForm->cleanXSS($data['passwordConfirm-registration-nounou']);

            if($ValideForm->verifEmail($user['email'])){
                $emailExist = $this->nounouModel->getNounouByEmail($user['email']);
                if(empty($emailExist)){
                    $errors = $ValideForm->verifText($errors, $user['last_name'], 2, 30, 'last_name');
                    $errors = $ValideForm->verifText($errors, $user['first_name'], 2, 30, 'first_name');
                    $errors = $ValideForm->validatePassword($user['password'], $passwordConfirm, $errors, 'password', 'passwordConfirm', 8);
                    $errors = $ValideForm->checkGender($user['genre'], $errors, 'genre');
    
                    if(count($errors) === 0){
                        unset($passwordConfirm);
                        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
                        $user = $this->encodeChars($user);
                        $this->nounouModel->create($user);
                        unset($user['password']);
                        header("Location: home");
                    }
    
                } else {
                    $errors['email'] = 'Email déjà utilisé';
                }

            } else {
                $errors['email'] = 'Email invalide';
            }



            
        }

        $this->render('registerNounou', [
            'errors' => $errors,
        ]);
    }

    public function login($data){
        $errors = [];

        if (isset($data["email-login-nounou"])) {

            $ValideForm = new VerifForm();
            $email = $ValideForm->cleanXSS($data["email-login-nounou"]);

            $nounou = $this->nounouModel->getNounouByEmail($email);

            if ($nounou && password_verify($data["password-login-nounou"], $nounou->password)) {
                $_SESSION["user"]['email'] = $nounou->email;
                $_SESSION["user"]['status'] = $nounou->status;
                $_SESSION["user"]['last_name'] = $nounou->last_name;
                $_SESSION["user"]['first_name'] = $nounou->first_name;
                $_SESSION["user"]['adresse'] = $nounou->adresse;
                $_SESSION["user"]['type'] = $nounou->type;
                header("Location: loginNounou");
            } else {
                $errors['login'] = "Utilisateur ou mot de passe incorrect.";
            }
            
        }

        $this->render('loginNounou', [
            'errors' => $errors,
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: home");
    }

}