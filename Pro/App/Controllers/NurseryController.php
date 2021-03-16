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

        if(!empty($data['email-registration-nursery'])){
            $errors = [];
            $user = [];
            $ValideForm = new VerifForm();

            $email = $ValideForm->cleanXSS($data['email-registration-nursery']);
            $name = $ValideForm->cleanXSS($data['name-registration-nursery']);
            $password = $ValideForm->cleanXSS($data['password-registration-nursery']);
            $passwordConfirm = $ValideForm->cleanXSS($data['passwordConfirm-registration-nursery']);
            
        }

        $this->render('registerNursery');
    }
}