<?php
namespace App\Controllers;

use App\Models\NurseryModel;
use Core\Controller\Controller;
use Public\inc\Class\VerifForm;

class NurseryController extends Controller {

    public function __construct()
    {
        $this->nurseryModel = new NurseryModel();
    }

    public function register($data) {
        $errors = [];

        if(!empty($data['email-registration-nursery'])){
            $user = [];
            $ValideForm = new VerifForm();

            $user['email'] = $ValideForm->cleanXSS($data['email-registration-nursery']);
            $user['name'] = $ValideForm->cleanXSS($data['name-registration-nursery']);
            $user['password'] = $ValideForm->cleanXSS($data['password-registration-nursery']);
            $passwordConfirm = $ValideForm->cleanXSS($data['passwordConfirm-registration-nursery']);

            if($ValideForm->verifEmail($user['email'])){
                $emailExist = $this->nurseryModel->getNurseryByEmail($user['email']);
                if(empty($emailExist)){
                    $errors = $ValideForm->verifText($errors, $user['name'], 2, 50, 'name');
                    $errors = $ValideForm->validatePassword($user['password'], $passwordConfirm, $errors, 'password', 'passwordConfirm', 8);
    
                    if(count($errors) === 0){
                        unset($passwordConfirm);
                        $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
                        $user = $this->encodeChars($user);
                        $this->nurseryModel->create($user);
                        unset($user['password']);
                        header("Location: loginNursery");
                    }
    
                } else {
                    $errors['email'] = 'Email déjà utilisé';
                }

            } else {
                $errors['email'] = 'Email invalide';
            }



            
        }

        $this->render('registerNursery', [
            'errors' => $errors,
        ]);
    }

    public function login($data){
        $errors = [];

        if (isset($data["email-login-nursery"])) {

            $ValideForm = new VerifForm();
            $email = $ValideForm->cleanXSS($data["email-login-nursery"]);

            $nursery = $this->nurseryModel->getNurseryByEmail($email);

            if ($nursery && password_verify($data["password-login-nursery"], $nursery->password)) {
                $_SESSION["user"]['email'] = $nursery->email;
                $_SESSION["user"]['status'] = $nursery->status;
                $_SESSION["user"]['name'] = $nursery->name;
                $_SESSION["user"]['places'] = $nursery->places;
                $_SESSION["user"]['adresse'] = $nursery->adresse;
                $_SESSION["user"]['type'] = $nursery->type;
                header("Location: home");
            } else {
                $errors['login'] = "Utilisateur ou mot de passe incorrect.";
            }
            
        }

        $this->render('loginNursery', [
            'errors' => $errors,
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location: home");
    }

}