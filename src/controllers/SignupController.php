<?php

namespace Jose\MultiserviciosMelgar\controllers;

use Jose\MultiserviciosMelgar\lib\Controller;
use Jose\MultiserviciosMelgar\models\User;

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

        // Aquí puedes agregar la lógica para guardar el usuario en la base de datos
        // Por ejemplo, usando un modelo de usuario
        // $userModel = new UserModel();
        // $userModel->create($username, $email, $password);
        
        // Redirigir a la página de inicio o mostrar un mensaje de éxito
        if (
            !is_null($username) &&
            !is_null($lastname) &&
            !is_null($password) &&
            !is_null($email) &&
            !is_null($phone) &&
            !is_null($birthdate)
            ) {
            $user = new User(
                $username, $lastname, $password,$email, $phone, $birthdate
            );

            $user->save();
            header('Location: /multiservicios-melgar2/login');
        } else {
            $this->render('errors/index');
        }
    }
}