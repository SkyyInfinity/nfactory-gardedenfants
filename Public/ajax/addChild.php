<?php
require('../inc/functions.php');
use Core\App;
use App\Controllers\UserController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$user = new UserController();
$errors = [];
$success = false;
debug($_POST);
if (!empty($_POST)) {
    
} else {
    $errors = 'veuillez renseigner les champs';
}
$data = array(
    'errors' => $errors,
    'success' => $success
);

showJson($data);

