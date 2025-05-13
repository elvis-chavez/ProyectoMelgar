<?php
use Jose\ProyectoMelgar\controllers\DefaultController;
use Jose\ProyectoMelgar\controllers\SignupController;
use Jose\ProyectoMelgar\controllers\LoginController;
use Jose\ProyectoMelgar\controllers\HomeController;
use Jose\ProyectoMelgar\controllers\ProviderController;
use Jose\ProyectoMelgar\controllers\UserController;

$router = new \Bramus\Router\Router();
session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->safeLoad();

/**
 * Definimos las rutas de la aplicación
 */

$router->get('/', function() {
    echo 'Inicio';
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

// Rutas para el CRUD de usuarios
$router->get('/users', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new UserController($user);
    $controller->getUsers();
});

$router->get('/users/form', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new UserController($user);
    $controller->getForm();
});

$router->post('/users/register', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new UserController($user);
    $controller->createUser();
});

$router->get('/users/edit/{id}', function($id) {
    $user = unserialize($_SESSION['user']);
    $controller = new UserController($user);
    $controller->editForm($id);
});

$router->post('/users/update', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new UserController($user);
    $controller->updateUser();
});

// Rutas para el CRUD de proveedores
$router->get('/provider', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->getProviders();
});

$router->get('/provider/form', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->getForm();
});

$router->post('/provider/register', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->createProvider();
});

$router->get('/provider/edit/{id}', function($id) {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->editForm($id);
});

$router->post('/provider/update', function() {
    $user = unserialize($_SESSION['user']);
    $controller = new ProviderController($user);
    $controller->updateProvider();
});

$router->run();