<?php

use Core\App;

define('ROOT', dirname(__DIR__). '/');
require ROOT . 'Core/App.php';
require ROOT . 'Public/inc/functions.php';

// Instanciation de la class App et appel de la fonction load pour charger l'autoloader et la session
App::load();

require ROOT ."Config/routeur.php";
