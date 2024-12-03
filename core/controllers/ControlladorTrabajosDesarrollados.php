<?php
require_once __DIR__ . "/../models/ModeloTrabajosDesarrollados.php"; // Modelo para interactuar con la tabla "trabajos desarrollados"

class ControladorTrabajosDesarrollados {
    public static function getData() {
        try {
            $trabajos_desarrollados = ModeloTrabajosDesarrollados::getData();
            return $trabajos_desarrollados;
        } catch (\Error $error) {
            error_log($error);
        }
    }
}

?>
