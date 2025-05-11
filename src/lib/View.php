<?php

namespace Jose\ProyectoMelgar\lib;

/**
 * Clase View
 * Renderiza las vistas de la aplicación
 */

class View {
    private $d;
    
    public function render(string $name, array $data = []) {
        $this->d = $data;
        require 'src/views/' . $name . '.php';
    }
}