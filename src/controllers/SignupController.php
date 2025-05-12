<?php

namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;
use Jose\ProyectoMelgar\models\User;

class SignupController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->render('signup/index');
    }

    public function register() {
        $username = $this->post('username');
        $lastname = $this->post('lastname');
        $password = $this->post('password');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $birthdate = $this->post('birthdate');

        if (
            !is_null($username) &&
            !is_null($lastname) &&
            !is_null($password) &&
            !is_null($email) &&
            !is_null($phone) &&
            !is_null($birthdate)
            ) {
            $user = new User(
                $username, $lastname, $password, $email, $phone, $birthdate
            );

            $user->save();
            header('location: /ProyectoMelgar/login');
        } else {
            $this->render('errors/index');
        }
    }
}