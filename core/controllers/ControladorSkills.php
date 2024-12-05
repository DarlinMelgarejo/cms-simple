<?php
require_once __DIR__ . "/../models/ModeloSkills.php"; // Modelo para interactuar con la tabla "skills"

class ControladorSkills {
    public static function getData($id) {
        try {
            $skills = ModeloSkills::getData($id);
            return $skills;
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
    
            // Aquí puedes insertar los datos en la base de datos
            // Por ejemplo, si tienes una función `insertarDatosPortafolio` en el modelo
            ModeloSkills::setData($portafolio_id, $nombre, $descripcion);
            
        } catch (PDOException $e) {
            error_log($e);
        }
    }

    public static function delete() {
        $skill_id = $_GET["id"];

        ModeloSkills::delete($skill_id);
    }
}

?>
