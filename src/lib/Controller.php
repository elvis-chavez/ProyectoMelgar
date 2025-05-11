<?php

namespace Jose\ProyectoMelgar\lib;

use Jose\ProyectoMelgar\lib\View;

/**
 * Clase Controller
 * Controlador base de la aplicación
 */

class Controller {
    private View $view;

    public function __construct() {
        $this->view = new View();
    }
    
    public function render(string $name, array $data = []) {
        $this->view->render($name, $data);
    }
    
    protected function get(string $param) {
        if (!isset($_GET[$param])) {
            return NULL;
        }
        return $_GET[$param];
    }

    protected function post(string $param) {
        if (!isset($_POST[$param])) {
            return NULL;
        }
        return $_POST[$param];
    }
}