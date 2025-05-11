<?php
use Jose\MultiserviciosMelgar\controllers\SignupController;
use Jose\MultiserviciosMelgar\controllers\LoginController;
use Jose\MultiserviciosMelgar\controllers\HomeController;
use Jose\MultiserviciosMelgar\controllers\ProviderController;

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
    header('Location: /multiservicios-melgar2/login');
});

$router->get('/profile/{username}', function($username) {
    echo 'inicio8';
});

$router->get('/provider', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->render('provider/index');
});

$router->run();