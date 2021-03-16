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
    case "registration":
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
    default:
        $user = new UserController();
        $user->login($_POST);
        break;

}