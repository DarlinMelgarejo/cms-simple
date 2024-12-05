<?php
include_once __DIR__ . "/../controllers/ControladorSkills.php";

class RouterSkills {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "agregar":
                ControladorSkills::setData();
                break;
            
            case "eliminar":
                ControladorSkills::delete();
                break;
        }
    }
}
?>