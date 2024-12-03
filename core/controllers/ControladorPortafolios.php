<?php
require_once __DIR__ . "/../models/ModeloPortafolios.php"; // Modelo para interactuar con la tabla "portafolios"

class ControladorPortafolios {
    public static function data() {
        try {
            $usuario = ModeloPortafolios::getData();
            return $usuario;
        } catch (\Error $error) {
            error_log($error);
        }
    }
}

?>
