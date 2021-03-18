<?php
namespace App\Controllers;

use Core\Controller\Controller;
use App\Models\NounouDashboardModel;

class NounouDashboardController extends Controller {

    public function __construct()
    {
        $this->NurseryDashboardModel = new NounouDashboardModel();
    }

    public function home() {
        $this->render('NounouDashboard');
    }
}