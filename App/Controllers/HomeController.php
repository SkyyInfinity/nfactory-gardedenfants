<?php
namespace App\Controllers;

use Core\Controller\Controller;

class HomeController extends Controller {

    public function home() {
        $this->render('home');
    }

    public function contact() {
        $this->render('contact');
    }
}