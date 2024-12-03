<?php
require_once __DIR__ . "/../models/ModeloSkills.php"; // Modelo para interactuar con la tabla "skills"

class ControladorSkills {
    public static function data() {
        try {
            $skills = ModeloSkills::getData();
            return $skills;
        } catch (\Error $error) {
            error_log($error);
        }
    }
}

?>
