<?php

namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;
use Jose\ProyectoMelgar\models\User;
use Jose\ProyectoMelgar\models\Provider;

class ProviderController extends Controller {
    public function __construct(private User $user)
    {
        parent::__construct();
    }

    public function getProviders() {
        $providers = new Provider();
        $this->render('provider/index', ['user' => $this->user, 'providers' => $providers]);
    }
}