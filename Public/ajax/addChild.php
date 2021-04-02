<?php
require('../inc/functions.php');

use Core\App;
use App\Controllers\ChildController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$childC = new ChildController();

$errorsChild = [];
$success = false;

if (!empty($_POST)) {
    $child = $childC->encodeChars($_POST);
    $errorsChild = validationText($errorsChild, $child['name'], 'name', 1, 30);
    $errorsChild = validationNumber($errorsChild, $child['age'], 'age', 0, 12);
    if (count($errorsChild) == 0) {
        $childC->addChild($child);
    }
} else {
    $errorsChild = "Veuillez renseignez les champs";
}
$data = array(
    'errorsChild' => $errorsChild,
    'success' => $success
);

showJson($data);
