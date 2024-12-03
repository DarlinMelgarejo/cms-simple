<?php
require_once __DIR__ . "/../models/ModeloContactos.php"; // Modelo para interactuar con la tabla "contactos"

class ControladorContactos {
    public static function getData() {
        try {
            $contactos = ModeloContactos::getData();
            return $contactos;
        } catch (\Error $error) {
            error_log($error);
        }
    }
}

?>
