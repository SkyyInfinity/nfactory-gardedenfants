<?php
require('../../inc/functions.php');
$errors = array();
$success = false;
use App\Controllers\UserController;
$proPos = new UserController();
$proPos->getProPos();


if(count($errors) == 0) {
    $success = true;
}

$data = array(
    'errors' => $errors,
    'success' => $success,
    'ProLoc' => $proPos
);

showJson($data);

