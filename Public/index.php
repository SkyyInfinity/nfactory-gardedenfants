<?php

use Core\App;

define('ROOT', dirname(__DIR__). '/');
require ROOT . 'Public/inc/functions.php';
require ROOT . 'Public/inc/url.php';
require ROOT . 'Core/App.php';

// Instanciation de la class App et appel de la fonction load pour charger l'autoloader et la session
App::load();

require ROOT ."Config/routeur.php";