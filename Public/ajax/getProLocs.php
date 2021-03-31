<?php
require('../inc/functions.php');
use Core\App;
use App\Controllers\UserController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$user = new UserController();
$proInfos['features'] = $user->userModel->getProLoc();
$i = 0;
foreach ($proInfos['features'] as $key => $value) {
    $proPos = json_decode(file_get_contents("https://api-adresse.data.gouv.fr/search/?q=".urlencode($value->adresse)));
    $proInfos['features'][$key]->coordinate = [$proPos->features[0]->geometry->coordinates[0],$proPos->features[0]->geometry->coordinates[1]];
    $i++;
}



$data = array(
    'proInfos' => $proInfos
);

showJson($proInfos);

