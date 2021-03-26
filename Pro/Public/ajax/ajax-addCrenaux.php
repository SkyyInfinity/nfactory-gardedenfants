<?php

use Core\App;
use Public\inc\Class\VerifForm;
use App\Controllers\NounouController;
use Public\inc\Class\ToolBox;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$nounou = new NounouController();

$ToolBox = new ToolBox();
$VerifForm = new VerifForm();
$errors = [];
$success = false;

if(!empty($_POST['start']) && !empty($_POST['end']) && $_POST['place']){

    $crenaux['begin_at'] = $VerifForm->cleanXSS($_POST['start']);
    $crenaux['end_at'] = $VerifForm->cleanXSS($_POST['end']);
    $crenaux['available_places'] = $VerifForm->cleanXSS($_POST['place']);
    $crenaux['id_user_nounou'] = $_SESSION['user']['id'];

    if($VerifForm->isNumber($crenaux['available_places'])){

        if(strtotime($crenaux['begin_at']) < strtotime($crenaux['end_at'])){
            $crenaux['remaining_places'] = $crenaux['available_places'];
            $nounou->nounouModel->createCustom($crenaux, 'kido_pro_planning_nounou');
            $success = true;
        } else {
            $errors['crénaux'] = 'La fin ne peux commencer avant le debut !';
        }
    };
}

if($success){
    $data = array(
        'success' => $success,
    );
} else {
    $data = array(
        'success' => $success,
        'errors' => $errors
    );
}

$ToolBox->showJson($data);