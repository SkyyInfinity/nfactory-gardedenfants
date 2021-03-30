<?php

use App\Controllers\ChildController;
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
        $user->signup();
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
        // $user = new UserController();
        // $user->homeUser();
        $childs = new ChildController();
        $childs->getChilds($_SESSION['user']->id);
        break;
    case "account":
        // $user = new UserController();
        // $user->account();
        $child = new ChildController();
        $child->addChild($_POST);
        break;
    case "forgotPassword":
        $user = new UserController();
        $user->forgotPassword();
        break;
    case "reserve":
        $child = new ChildController();
        $child->getChild($_SESSION['user']->id, $_GET['id']);
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}