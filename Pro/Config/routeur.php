<?php

use App\Controllers\HomeController;
use App\Controllers\NurseryController;

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
    case 'registerNursery':
        $nursery = new NurseryController();
        $nursery->register($_POST);
        break;
    default:
        $home = new HomeController();
        $home->home();
        break;
}