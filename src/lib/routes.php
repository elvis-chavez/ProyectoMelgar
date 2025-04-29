<?php
use Jose\MultiserviciosMelgar\controllers\SignupController;
use Jose\MultiserviciosMelgar\controllers\LoginController;

$router = new \Bramus\Router\Router();
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->safeLoad();

/**
 * Definimos las rutas de la aplicación
 */

$router->get('/', function() {
    echo 'inicio';
});

$router->get('/login', function() {
    $controller = new LoginController();
    $controller->render('login/index');
});

$router->post('/auth', function() {
    $controller = new LoginController();
    $controller->auth();
});

$router->get('/signup', function() {
    $controller = new SignupController();
    $controller->render('signup/index');
});

$router->post('/register', function() {
    $controller = new SignupController();
    $controller->register();
});

$router->get('/home', function() {
    echo 'Home';
});

$router->get('/profile', function() {
    echo 'inicio6';
});

$router->get('/logout', function() {
    echo 'inicio7';
});

$router->get('/profile/{username}', function($username) {
    echo 'inicio8';
});

$router->run();