<?php
namespace Jose\MultiserviciosMelgar\controllers;

use Jose\MultiserviciosMelgar\lib\Controller;
use Jose\MultiserviciosMelgar\models\User;

class HomeController extends Controller {

    public function __construct(private User $user)
    {
        parent::__construct();
    }

    public function index() {
        $this->render('home/index', ['user' => $this->user]);
    }
}