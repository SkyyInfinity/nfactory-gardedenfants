<?php

namespace App\Controllers;

use App\Models\ChildModel;
use Core\Controller\Controller;

class ChildController extends Controller {

    public function __construct() {
        $this->childModel = new ChildModel();
    }

    public function addChild($data) {
        if(!empty($data)) {
            // Variables
            $errorsChild = [];
            $child = $this->encodeChars($data);

            // Validation name
            validationText($errorsChild, $child['name'], 'name', 1, 30);
            // Validation age
            if(!empty($child['age'])) {
                if(!is_numeric($child['age'])) {
                    $errorsChild['age'] = "L'âge doit être un écrit en chiffre.";
                }
            } else {
                $errorsChild['age'] = "Veuillez renseigner ce champ.";
            }

            // Condition
            if (count($errorsChild) == 0) {
                // Lance la requête
                $this->userModel->create($child);
                // Redirection
                redirect('user');
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