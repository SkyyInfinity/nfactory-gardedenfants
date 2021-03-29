<?php
require('../inc/functions.php');
use Core\App;
use App\Controllers\UserController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$proPos = [];
$user = new UserController();
$proInfos = $user->userModel->getProLoc();
foreach ($proInfos as $key => $value) {
    array_push($proPos,json_decode(file_get_contents("https://api-adresse.data.gouv.fr/search/?q=".urlencode($value->adresse))));
}


$data = array(
    'ProPos' => $proPos,
    'proInfo' => $proInfos
);

showJson($data);

