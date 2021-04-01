<?php

use Public\inc\Class\ToolBox;
use Public\inc\Class\VerifForm;
use App\Controllers\NounouController;
use Core\App;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$nounou = new NounouController();

$toolbox = new ToolBox();
$errors = [];
$VerifForm = new VerifForm();
$success = false;

echo "Adresse : ".$_POST["key1"];
echo "Code Psstal: ".$_POST["key2"];
echo "long : ".floatval($_POST["key3"]);
echo "latt : ".floatval($_POST["key4"]);

if(!empty($_POST["key1"]) && !empty($_POST["key2"]) && !empty($_POST["key3"]) && !empty($_POST["key4"])){

    $addgeo['adresse'] = $VerifForm->cleanXSS($_POST['key1']);
    $addgeo['code_postal'] = $VerifForm->cleanXSS($_POST['key2']);
    $addgeo['longi'] = $VerifForm->cleanXSS($_POST['key3']);
    $addgeo['latt'] = $VerifForm->cleanXSS($_POST['key4']);

    if(count($errors) === 0){
        $addgeo["id_user"] = $_SESSION['user']['id'];
        $nounou->nounouModel->createCustom($addgeo, 'kido_pro_locate');
        $suceess = true;

    }

}