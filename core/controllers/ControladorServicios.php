<?php
require_once __DIR__ . "/../models/ModeloServicios.php"; // Modelo para interactuar con la tabla "servicios"

class ControladorServicios {
    public static function getData($id) {
        try {
            $servicios = ModeloServicios::getData($id);
            return $servicios;
        } catch (\Error $error) {
            error_log($error);
        }
    }

    public static function setData() {
        try {
            // Obtener datos del formulario
            $portafolio_id = filter_input(INPUT_POST, "portafolio_id", FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_SPECIAL_CHARS);                
    
            ModeloServicios::setData($portafolio_id, $nombre, $descripcion);
            
        } catch (PDOException $e) {
            error_log($e);
        }
    }

    public static function delete() {
        $skill_id = $_GET["id"];

        ModeloServicios::delete($skill_id);
    }
}

?>
