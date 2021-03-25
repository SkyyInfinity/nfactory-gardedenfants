<?php

namespace App\Controllers;

use App\Models\UserModel;
use Core\Controller\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function signup()
    {
        $this->render("auth.signup");
    }
    public function signupRequest($data)
    {
        $errors = [];
        $user = $this->encodeChars($data);
        validationText($errors, $user["name"], 'name', 1, 30);
        validationText($errors, $user["surname"], 'surname', 1, 30);
        validationEmail($errors, $user["email"], 'email');
        if (!empty($user["password"]) && !empty($user["password2"])) {
            if ($user["password"] == $user["password2"]) {
                unset($user["password2"]);
                validationPassword($errors, $user['password'], 'password', 8, 30);
            } else {
                $errors['passwords'] = "Les mots de passe ne sont pas identiquent";
            }
        } else {
            $errors['passwords'] = "Veuillez renseigner ce champ";
        }
        if (count($errors) == 0) {
            $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModel->create($user);

            header("Location:login");
        }
        if (count($errors) != 0) {
            $this->render("auth.signup", [
                "errors" => $errors
            ]);
        }
    }
    public function login()
    {
        $this->render("auth.login");
    }

    public function loginRequest($data)
    {
        if (!empty($data["email"])) {
            $user = $this->userModel->getUserByEmail($data["email"]);
            if ($user && password_verify($data["password"], $user->password)) {
                $_SESSION["user"] = $user;
                $_SESSION["user"]->role = json_decode($user->role);
                header("Location:user");
            } else {
                $errors = "Utilisateur ou mot de passe incorrect.";
            }
        } else {
            $errors = "Veuillez renseigner les champs";
        }
        if (!empty($errors)) {
            $this->render("auth.login", [
                "errors" => $errors
            ]);
        }
    }

    public function logout()
    {
        $_SESSION['user'] = [];
        session_destroy();
        header("Location:login");
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

        if (empty($data["password"])) {
            $user = [];
            foreach ($data as $key => $value) {
                if ($key !== "password") {
                    $user[$key] = $value;
                }
            }
            $this->userModel->updateWithoutPassword($_GET["id"], $user);
        } else {
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

            $this->userModel->updateWithPassword($_GET["id"], $data);
        }
    }

    public function homeUser()
    {
        $this->render("user");
    }
    public function account()
    {
        $this->render("account");
    }
    public function forgotPassword() {
        $_SESSION['user'] = [];
        session_destroy();
        $this->render("forgotPassword");
    }
}
