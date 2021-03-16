<?php
require('../inc/function.php');
$errors = array();
$success = false;
// Faille XSS 
$name = trim(strip_tags($_POST['name']));
$surname = trim(strip_tags($_POST['surname']));
$email = trim(strip_tags($_POST['email']));
$password = trim(strip_tags($_POST['password']));
$password2 = trim(strip_tags($_POST['password2']));

// Validation du formulaire 

$errors = validText($errors,$nom,'nom',4,30);
$errors = validText($errors,$prenom,'prenom',4,30);
$errors = validText($errors,$email,'email','','',$emailM = true);
// $errors = validEmail($errors,$email,'email');
$errors = validText($errors,$age,'age',1,2);

if(count($errors) == 0) {
    $success = true;
}

$data = array(
    'errors' => $errors,
    'success' => $success
);

showJson($data);