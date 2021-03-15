<?php

use Vendor\App;

define('ROOT', dirname(__DIR__));
require ROOT . '/Vendor/App.php';

// Instanciation de la class App et appel de la fonction load pour charger l'autoloader et la session
App::load();

require ROOT ."/Config/Routing.php";