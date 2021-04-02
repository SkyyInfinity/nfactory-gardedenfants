<?php

namespace App\Controllers;

use App\Models\ChildModel;
use Core\Controller\Controller;

class ChildController extends Controller
{

    public function __construct()
    {
        $this->childModel = new ChildModel();
    }

    public function addChild($data)
    {

        if (!empty($data)) {
            $info = ['name' => $data['name'], 'age' => $data['age']];
            $disease = $data['disease'];
            $allergy = $data['allergy'];
            debug($disease);
            $this->childModel->addChild($info);
            $id = $this->childModel->getlastInsertId();
            foreach ($disease as $key => $value) {
                $values = [
                    'id' => $id,
                    'disease' => $value
                ];
                $this->childModel->addChild_disease($values);
            }
            //allergies
            foreach ($allergy as $key => $value) {
                $this->childModel->addChild_allergy($id,$value);
            }
            // Redirection
            // redirect('user');
        } else {
            $this->render('account');
        }

        // Render dans la Vue

    }

    public function getChilds($idParent)
    {
        // Lance la requête
        $childs = $this->childModel->getChildsByParent($idParent);

        // Render dans la Vue
        $this->render('user', [
            'childs' => $childs
        ]);
    }



    public function getChild($idParent, $idChild)
    {
        // Lance la requête
        $child = $this->childModel->getChildByParent($idParent, $idChild);

        // Render dans la Vue
        $this->render('reserve', [
            'child' => $child
        ]);
    }
}
