<?php
namespace App\Controllers;

use App\Models\UserModel;
use Core\Controller\Controller;

class UserController extends Controller{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function signup($data)
    {
        if (isset($data["email"])) {
            $user = $this->encodeChars($data);
            $user["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModel->create($user);

            header("Location:index.php?page=login");
        }

        $this->render("auth.signup");

    }

    public function login($data)
    {
        if (isset($data["email"])) {

            $user = $this->userModel->getUserByEmail($data["email"]);

            if ($user && password_verify($data["password"], $user->password)) {
                $_SESSION["user"] = $user;
                $_SESSION["user"]->role = json_decode($user->role);
                header("Location:index.php");
            } else {
                $error = "Utilisateur ou mot de passe incorrect.";
            }
            
        }
        $this->render("auth.login");

    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php");
    }

    public function getUser()
    {
        $user = $this->userModel->readOne($_GET["id"]);

        $this->render("user", [
            "user" => $user,
        ]);
    }

    public function updateUser($data)
    {
        $data = $this->encodeChars($data);

        if(empty($data["password"])){
            $user = [];
            foreach($data as $key=>$value){
                if($key !== "password"){
                    $user[$key] = $value;
                }
            }
            // $this->userModel->updateWithoutPassword($_GET["id"], $user);
        } else {
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

            $this->userModel->updateWithPassword($_GET["id"], $data);
        }
    }
}