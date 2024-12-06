<?php
require_once __DIR__ . "/../models/ModeloContactos.php"; // Modelo para interactuar con la tabla "contactos"

class ControladorContactos {
    public static function getData($id) {
        try {
            $contactos = ModeloContactos::getData($id);
            return $contactos;
        } catch (\Error $error) {
            error_log($error);
        }
    }

    public static function setData() {
        try {
            $portafolio_id = filter_input(INPUT_POST, "portafolio_id", FILTER_SANITIZE_NUMBER_INT);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $url_linkedin = filter_input(INPUT_POST, "linkedin", FILTER_SANITIZE_URL);
            $url_github = filter_input(INPUT_POST, "github", FILTER_SANITIZE_URL);

            ModeloContactos::setData($portafolio_id, $email, $url_linkedin, $url_github);
        } catch (PDOException $e) {
            error_log($e);
        }


    }
}

?>
