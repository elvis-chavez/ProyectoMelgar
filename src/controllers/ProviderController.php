<?php

namespace Jose\MultiserviciosMelgar\controllers;
use Jose\MultiserviciosMelgar\lib\Controller;
use Jose\MultiserviciosMelgar\models\User;

class ProviderController extends Controller {
    public function __construct(private User $user)
    {
        parent::__construct();
    }
}