<?php
require_once __DIR__ . "/../models/ModeloServicios.php"; // Modelo para interactuar con la tabla "servicios"

class ControladorServicios {
    public static function getData() {
        try {
            $servicios = ModeloServicios::getData();
            return $servicios;
        } catch (\Error $error) {
            error_log($error);
        }
    }
}

?>
