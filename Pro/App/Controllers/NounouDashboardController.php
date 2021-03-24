<?php
namespace App\Controllers;

use Core\Controller\Controller;
use App\Models\NounouDashboardModel;

class NounouDashboardController extends Controller {

    public function __construct()
    {
        $this->nounouDashboardModel = new NounouDashboardModel();
    }

    public function home() {

        $competences = $this->nounouDashboardModel->getAllSkills($_SESSION['user']['id']);

        $this->render('NounouDashboard', [
            'competences' => $competences
        ]);
    }
}