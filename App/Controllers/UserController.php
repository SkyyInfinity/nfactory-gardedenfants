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
        $errors = validationText($errors, $user["name"], 'name', 1, 30);
        $errors = validationText($errors, $user["surname"], 'surname', 1, 30);
        $errors = validationEmail($errors, $user["email"], 'email');
        $errors = validationPassword($errors, $user['password'], $user['password2'], 'password', 8, 30);
        if (empty($errors)) {
            unset($user['password2']);
            $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
            $user["role"] = json_encode(['user']);
            $this->userModel->create($user);
            header("Location:login");
        } else {
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
            if ($user = $this->userModel->getUserByEmail($data["email"])) {
                if ($user && password_verify($data["password"], $user->password)) {
                    $_SESSION["user"] = $user;
                    $_SESSION["user"]->role = json_decode($user->role);
                    $user = [];
                    header("Location:user");
                } else {
                    $errors = "Utilisateur ou mot de passe incorrect.";
                }
            }
        } else {
            $errors = "Veuillez renseigner les champs";
        }
        if (!empty($errors)) {
            $this->render("auth.login", [
                "error" => $errors
            ]);
        }
    }

    public function logout()
    {
        $_SESSION['user'] = [];
        session_destroy();
        header("Location:home");
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
        $this->userModel->updateWithoutPassword($_SESSION["user"]->id, $data);
        $_SESSION["user"]->name = $data['name'];
        $_SESSION["user"]->surname = $data['surname'];
        $_SESSION["user"]->email = $data['email'];
        header("Location:account");
    }

    public function homeUser()
    {
        $this->render("user");
    }
    public function account()
    {
        $this->render("account");
    }
    public function forgotPassword()
    {
        $_SESSION['user'] = [];
        session_destroy();
        $this->render("forgotPassword");
    }
    public function submitContact($data)
    {
        $errors = [];
        $errors = validationText($errors, $data["email"], 'email', 7, 30);
        $errors = validationText($errors, $data["title"], 'title', 10, 50);
        $errors = validationText($errors, $data["textMessage"], 'textMessage', 10, 200);
        if (empty($errors)) {
            $success = "Message envoyé";
            $this->userModel->submitContact($data);
            $this->render("contact", [
                "success" => $success
            ]);
        } else {
            $this->render("contact", [
                "errors" => $errors
            ]);
        }
    }
}
