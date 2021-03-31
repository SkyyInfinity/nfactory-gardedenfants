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
        $user->signup($_POST);
        break;
    case "login":
        $user = new UserController();
        $user->login($_POST);
        break;
    case "logout":
        $user = new UserController();
        $user->logout();
        break;
    case "user":
        // $user = new UserController();
        // $user->homeUser();
        $childs = new ChildController();
        $user = new UserController();
        if(!empty($_SESSION['user']->id)) {
            $childs->getChilds($_SESSION['user']->id);
        } else {
            $user->logout();
        }
        break;
    case "account":
        // $user = new UserController();
        // $user->account();
        $child = new ChildController();
        $child->addChild($_POST);
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
    case "reserve":
        $child = new ChildController();
        $child->getChild($_SESSION['user']->id, $_GET['id']);
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}