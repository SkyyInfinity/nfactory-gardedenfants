<?php
namespace App\Controllers;

use App\Models\NurseryModel;
use class\VerifForm;
use Core\Controller\Controller;

class NurseryController extends Controller {

    public function __construct()
    {
        $this->nurseryModel = new NurseryModel();
    }

    public function register($data) {

        if(!empty($data['email'])){
            $errors = [];
            $user = [];
            $ValideForm = new VerifForm();

            $email = $ValideForm->cleanXSS($data['email']);
            $password = $ValideForm->cleanXSS($data['password']);
            $passwordConfirm = $ValideForm->cleanXSS($data['passwordConfirm']);
            
        }

        $this->render('registerNursery');
    }
}