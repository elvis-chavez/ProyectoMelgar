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
        $this->render('provider/index', ['user' => $this->user, 'providers' => $providers->getAll()]);
    }

    public function getForm() {
        $this->render('provider/form', ['user' => $this->user]);
    }

    public function createProvider() {
        $name = $this->post('name');
        $contact = $this->post('contact');

        if (
            !is_null($name) &&
            !is_null($contact)
            ) {
            $provider = new Provider();
            $provider->setName($name);
            $provider->setContact($contact);

            $provider->save();
            header('Location: /ProyectoMelgar/provider');
        } else {
            $this->render('errors/index');
        }
    }

    public function editForm($id) {
        if (!is_null($id)) {
            $provider = Provider::getById($id);
            
            if ($provider) {
                $this->render('provider/form', [
                    'user' => $this->user,
                    'provider' => $provider
                ]);
            }
        }
        $this->render('errors/index');
    }

    public function updateProvider() {
        $id = $this->post('id');
        $name = $this->post('name');
        $contact = $this->post('contact');

        if (
            !is_null($id) &&
            !is_null($name) &&
            !is_null($contact)
            ) {
            $provider = Provider::getById($id);
            
            if ($provider) {
                $provider->setName($name);
                $provider->setContact($contact);
                $provider->update($provider);

                header('Location: /ProyectoMelgar/provider');
            }
        }
        $this->render('errors/index');
    }
}