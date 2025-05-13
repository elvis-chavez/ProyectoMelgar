<?php

namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;

class DefaultController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function defaultPage() {
        $this->render('default/index');
    }
}