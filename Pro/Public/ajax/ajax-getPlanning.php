<?php

use Core\App;
use Public\inc\Class\ToolBox;
use App\Controllers\NounouController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$ToolBox = new ToolBox();
$nounou = new NounouController();
$data = [];
$id = 0;

$crenaux = $nounou->nounouModel->getAllCrenauxOfNounou($_SESSION['user']['id']);

foreach($crenaux as $crenau){
    $data[$id]['title'] = 'Places disponibles : ' . $crenau->remaining_places . '/' . $crenau->available_places;
    $data[$id]['start'] = $crenau->begin_at;
    $data[$id]['end'] = $crenau->end_at;
    if($crenau->remaining_places == 0 ){
        $data[$id]['color'] = 'red';
    } elseif($crenau->remaining_places == $crenau->available_places) {
        $data[$id]['color'] = 'green';
    } else {
        $data[$id]['color'] = 'orange';
    }
    $id++;
}

$ToolBox->showJson($data);