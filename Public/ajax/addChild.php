<?php
require('../inc/functions.php');

use Core\App;
use App\Controllers\UserController;

define('ROOT', dirname(dirname(__DIR__)) . '/');
require '../../Core/App.php';
App::load();

$user = new UserController();
$errorsChild = [];
$success = false;

$child = $this->encodeChars($data);
$errorsChild = validationText($errorsChild, $child['name'], 'name', 1, 30);
$errorsChild = validationNumber($errorsChild, $child['age'], 'age', 0, 12);

if (count($errorsChild) == 0) {
    // Lance la requête
    // child
    // $statement = "INSERT INTO kido_child(id_parent, 'name', age) 
    //               VALUES (".$_SESSION['user']->id.", ".$child['name'].", ".$child['age']."";
    // $this->db->postData($statement, $data);

    // diseases
    // $statement = "INSERT INTO kido_child_diseases(id_enfant, titre, 'description') 
    //               VALUES ([value-2], [value-3], [value-4])";

    // $this->db->postData($statement, $data);
    // // allergies
    // $statement = "INSERT INTO kido_child_allergy(id_enfant, titre, 'description') 
    //               VALUES ([value-2], [value-3], [value-4])";

    // $this->db->postData($statement, $data);
    // Redirection
    // redirect('user');
}
$data = array(
    'errors' => $errors,
    'success' => $success
);

showJson($data);
