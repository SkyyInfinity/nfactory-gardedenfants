<?php
session_start();

use Public\inc\Class\ToolBox;
use Public\inc\Class\VerifForm;

require('../../Core/Autoloader/Autoloader.php');

require('../inc/Class/ToolBox.php');

$toolbox = new ToolBox();

if(isset($_FILES['PV_file'])){
    $name = implode($_SESSION['user']);
    $PVerror = "";
    $file = $_FILES['PV_file'];
    $fileName = $_FILES['PV_file']['name'];
    $fileTmpName = $_FILES['PV_file']['tmp_name'];
    $fileSize = $_FILES['PV_file']['size'];
    $fileError = $_FILES['PV_file']['error'];
    $fileType =$_FILES['PV_file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../uploads/'.$name.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $PVsuccess = "envoyé :)";
            }else{
                $PVerror = "Votre fichiers est trop grand";
            }
        }else{
            $PVerror = "Il y a eu une error, votre fichier est peut étre corompue";
        }
    }else{
        $PVerror = "Vous ne pouvez pas upload ce type fichier";
    }

}
