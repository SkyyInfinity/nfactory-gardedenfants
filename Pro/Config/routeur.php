<?php

use Public\inc\Class\ToolBox;
use App\Controllers\HomeController;
use App\Controllers\NounouController;
use App\Controllers\NurseryController;
use App\Controllers\NounouDashboardController;
use App\Controllers\NurseryDashboardController;

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

    //Nursery
    case 'registerNursery':
        $nursery = new NurseryController();
        $nursery->register($_POST);
        break;
    case 'loginNursery':
        $nursery = new NurseryController();
        $nursery->login($_POST);
        break;
    case 'logoutNursery':
        $nursery = new NurseryController();
        $nursery->logout();
        break;

    //Nounou
    case 'registerNounou':
        $nounou = new NounouController();
        $nounou->register($_POST);
        break;
    case 'loginNounou':
        $nounou = new NounouController();
        $nounou->login($_POST);
        break;
    case 'logoutNounou':
        $nounou = new NounouController();
        $nounou->logout();
        break;
        
    //Redirection vers le bon dashboard
    case 'Dashboard':
        $ToolBox = new ToolBox();

        if($ToolBox->isLogged()){

            if($_SESSION['user']['type'] === 'nursery') {
                $dashboard = new NurseryDashboardController();
                $dashboard->home();
            } elseif ($_SESSION['user']['type'] === 'nounou'){
                $dashboard = new NounouDashboardController();
                $dashboard->home();
            }

        } else {
            $home = new HomeController();
            $home->home();
        }

        break;

    default:
        $home = new HomeController();
        $home->home();
        break;
}