<?php
namespace App\Controllers;

use Core\Controller\Controller;
use App\Models\NurseryDashboardModel;

class NurseryDashboardController extends Controller {

    public function __construct()
    {
        $this->NurseryDashboardModel = new NurseryDashboardModel();
    }

    public function home() {
        $this->render('NurseryDashboard');
    }

    public function VerifProFile(){
        if(isset($_POST['VerifProFile'])){
            $file = $_FILES['file'];
            debug($file);
            $fileName = $_FILES['file']['name'];

        }
    }
}