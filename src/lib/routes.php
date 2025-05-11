<?php
use Jose\ProyectoMelgar\controllers\SignupController;
use Jose\ProyectoMelgar\controllers\LoginController;
use Jose\ProyectoMelgar\controllers\HomeController;
use Jose\ProyectoMelgar\controllers\ProviderController;

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
    $user = unserialize($_SESSION['user']);
    $controller = new HomeController($user);
    $controller->index();
});

$router->get('/profile', function() {
    echo 'inicio6';
});

$router->get('/logout', function() {
    unset($_SESSION['user']);
    header('Location: /ProyectoMelgar/login');
});

$router->get('/profile/{username}', function($username) {
    echo 'inicio8';
});

$router->get('/provider', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->getProviders();
});

$router->run();