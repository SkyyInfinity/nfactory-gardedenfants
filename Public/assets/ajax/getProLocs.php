<?php
use Core\App;
use Core\Autoloader\Autoloader;
use App\Controllers\UserController;
define('ROOT', dirname(dirname(__DIR__)) . '/');
App::load();
require('../../inc/functions.php');
$errors = array();
$success = false;
$proPos = new UserController();
$proPos->getProPos();

if(count($errors) == 0) {
    $success = true;
}

$data = array(
    'errors' => $errors,
    'success' => $success,
    'ProPos' => $proPos
);

showJson($data);

