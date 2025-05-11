<?php
namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;
use Jose\ProyectoMelgar\models\User;

class HomeController extends Controller {

    public function __construct(private User $user)
    {
        parent::__construct();
    }

    public function index() {
        $this->render('home/index', ['user' => $this->user]);
    }
}