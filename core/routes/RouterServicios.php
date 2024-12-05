<?php
include_once __DIR__ . "/../controllers/ControladorServicios.php";

class RouterServicios {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "agregar":
                ControladorServicios::setData();
                break;
            
            case "eliminar":
                ControladorServicios::delete();
                break;
        }
    }
}
?>