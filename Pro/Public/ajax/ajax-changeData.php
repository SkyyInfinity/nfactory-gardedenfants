<?php

use Core\App;
use Public\inc\Class\VerifForm;
use App\Controllers\NounouController;
use Public\inc\Class\ToolBox;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$nounou = new NounouController();
$actualUser = $nounou->nounouModel->getNounouByEmail($_SESSION['user']['email']);

$ToolBox = new ToolBox();
$ValideForm = new VerifForm();
$errors = [];
$success = false;

if($_POST['name-infoUser']){
    $last_name = $ValideForm->cleanXSS($_POST['name-infoUser']);
    if($last_name !== $actualUser->last_name) {
        $errors = $ValideForm->verifText($errors, $last_name, 2, 30, 'last_name');
        if(count($errors) == 0 ){
            $user['last_name'] = $last_name;
            $_SESSION['user']['last_name'] = $last_name;
        }
    }
}

if(!empty($_POST['firstname-infoUser'])){
    $firstname = $ValideForm->cleanXSS($_POST['firstname-infoUser']);
    if($firstname !== $actualUser->first_name){
        $errors = $ValideForm->verifText($errors, $firstname, 2, 30, 'first_name');
        if(count($errors) == 0){
            $user['first_name'] = $firstname;
            $_SESSION['user']['first_name'];
        }
    }
}

if(!empty($_POST['email-infoUser'])){
    $email = $ValideForm->cleanXSS($_POST['email-infoUser']);
    if($ValideForm->verifEmail($email) && ($email !== $actualUser->email)){
        $user['user'] = $email;
        $_SESSION['user']['email'];
    }
}

if(!empty($_POST['adresse-infoUser'])){
    $adresse = $ValideForm->cleanXSS($_POST['adresse-infoUser']);
    if($adresse !== $actualUser->adresse) {
        $errors = $ValideForm->verifText($errors, $adresse, 2, 150, 'adresse');
        if(count($errors) == 0 ){
            $user['adresse'] = $adresse;
            $_SESSION['user']['adresse'] = $adresse;
        }
    }
}

if(!empty($_POST['password-infoUser']) && !empty($_POST['confirmPassword-infoUser'])){
    $password = $ValideForm->cleanXSS($_POST['password-infoUser']);
    $passwordConfirm = $ValideForm->cleanXSS($_POST['confirmPassword-infoUser']);
    $errors = $ValideForm->validatePassword($user['password'], $passwordConfirm, $errors, 'password', 'passwordConfirm', 8);
    if(count($errors) == 0){
        $user['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
}

if(count($user) != 0) {
    $nounou->nounouModel->update($user, 'kido_pro_user_nounou', $actualUser->id);
    $success = true;
}