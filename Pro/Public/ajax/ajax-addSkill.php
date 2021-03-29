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

if(!empty($_POST['title-addSkill-nounou']) && !empty($_POST['description-addSkill-nounou'])){

    $skill['title'] = $VerifForm->cleanXSS($_POST['title-addSkill-nounou']);
    $skill['description'] = $VerifForm->cleanXSS($_POST['description-addSkill-nounou']);

    $errors = $VerifForm->verifText($errors, $skill['title'], 3, 50, 'title');
    $errors = $VerifForm->verifText($errors, $skill['description'], 3, 10000, 'description');

    if(count($errors) === 0) {
        $skill['id_user_nounou'] = $_SESSION['user']['id'];
        $nounou->nounouModel->createCustom($skill, 'kido_pro_caract_nounou');
        $success = true;
    }
}

if($success){
    $data = array(
        'success' => $success,
        'title' => $skill['title'],
        'description' => $skill['description']
    );
} else {
    $data = array(
        'success' => $success,
        'errors' => $errors
    );
}

$ToolBox->showJson($data);