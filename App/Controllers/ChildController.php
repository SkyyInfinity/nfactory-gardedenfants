<?php

namespace App\Controllers;

use App\Models\ChildModel;
use Core\Controller\Controller;

class ChildController extends Controller {

    public function __construct() {
        $this->childModel = new ChildModel();
    }

    public function addChild($data) {
        // Variables
        $success = false;
        $errorsChild = array();

        if(!empty($data)) {
            // Variables
            $child = $this->encodeChars($data);

            // Validation name
            $errorsChild = validationText($errorsChild, $child['name'], 'name', 1, 30);
            // Validation age
            // $errorsChild = validationNumber($errorsChild, $child['age'], 'age', 0, 12);
            debug($child);
            debug($data);

            // Condition
            if (count($errorsChild) == 0) {
                // Lance la requête
                // child
                $statement = "INSERT INTO kido_child(id_parent, 'name', age) 
                              VALUES (".$_SESSION['user']->id.", ".$child['name'].", ".$child['age']."";

                $this->db->postData($statement, $data);
                // diseases
                // $statement = "INSERT INTO kido_child_diseases(id_enfant, titre, 'description') 
                //               VALUES ([value-2], [value-3], [value-4])";

                // $this->db->postData($statement, $data);
                // // allergies
                // $statement = "INSERT INTO kido_child_allergy(id_enfant, titre, 'description') 
                //               VALUES ([value-2], [value-3], [value-4])";

                // $this->db->postData($statement, $data);
                // Redirection
                redirect('user');
                $success = true;
            }
        }
        // Render dans la Vue
        $this->render('account', [
            'errorsChild' => $errorsChild
        ]);
    }

    public function getChilds($idParent) {
        // Lance la requête
        $childs = $this->childModel->getChildsByParent($idParent);

        if(!empty($childs)) {
            $_SESSION['user']->childs = $childs;
        }

        // Render dans la Vue
        $this->render('user', [
            'childs' => $childs
        ]);
    }

    public function getChild($idParent, $idChild) {
        // Lance la requête
        $child = $this->childModel->getChildByParent($idParent, $idChild);

        // Render dans la Vue
        $this->render('reserve', [
            'child' => $child
        ]);
    }
}