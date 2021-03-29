<?php

use App\Controllers\UserController;
use App\Controllers\HomeController;

if (!empty($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}
switch ($page) {
    case 'home':
        $home = new HomeController();
        $home->home();
        break;
    case 'contact':
        $home = new HomeController();
        $home->contact();
        break;
    case "signup":
        $user = new UserController();
        $user->signup($_POST);
        break;
    case "signupRequest":
        $user = new UserController();
        $user->signupRequest($_POST);
        break;
    case "login":
        $user = new UserController();
        $user->login($_POST);
        break;
    case "loginRequest":
        $user = new UserController();
        $user->loginRequest($_POST);
        break;
    case "logout":
        $user = new UserController();
        $user->logout();
        break;
    case "user":
        $user = new UserController();
        $user->homeUser();
        break;
    case "account":
        $user = new UserController();
        $user->account();
        break;
    case "accountUpdate":
        $user = new UserController();
        $user->updateUser($_POST);
        break;
    case "forgotPassword":
        $user = new UserController();
        $user->forgotPassword();
        break;
    case "contactSubmit":
        $user = new UserController();
        $user->submitContact($_POST);
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}