<?php

namespace Jose\MultiserviciosMelgar\controllers;

use Jose\MultiserviciosMelgar\lib\Controller;
use Jose\MultiserviciosMelgar\models\User;

class LoginController extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function auth() {
        $username = $this->post('username');
        $password = $this->post('password');

        if (!is_null($username) && !is_null($password)) {
            // Verificamos si el usuario existe en la base de datos
            if (User::exists($username)) {
                // Verificamos la contraseña
                $user = User::get($username);

                // Comparamos el password ingresado con el password almacenado en la base de datos
                if ($user->comparePassword($password)) {
                    $_SESSION['user'] = serialize($user);
                    // Redirigimos al usuario a la página de inicio
                    error_log('Usuario autenticado');
                    header('Location: /ProyectoMelgar/home');
                } else {
                    // Si las credenciales son incorrectas, redirigimos al login
                    error_log('Credenciales incorrectas');
                    header('Location: /ProyectoMelgar/login');
                }
            } else {
                // Usuario no encontrado
                error_log('Usuario no encontrado');
                header('Location: /ProyectoMelgar/login');
            }
        } else {
            error_log('Datos de login incompletos');
            $this->render('errors/index');
        }
    }
}