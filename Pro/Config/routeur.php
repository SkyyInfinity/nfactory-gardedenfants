<?php

use Public\inc\Class\ToolBox;
use App\Controllers\HomeController;
use App\Controllers\NounouController;
use App\Controllers\NounouDashboardController;

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
            $dashboard = new NounouDashboardController();
            $dashboard->home();
        }else{
            $home = new HomeController();
            $home->home();
        }
        break;

    default:
        $home = new HomeController();
        $home->home();
        break;
}