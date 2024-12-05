<?php
include_once __DIR__ . "/../controllers/ControladorTrabajosDesarrollados.php";

class RouterTrabajosDesarrollados {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "agregar":
                ControladorTrabajosDesarrollados::setData();
                break;
            
            case "eliminar":
                ControladorTrabajosDesarrollados::delete();
                break;
        }
    }
}
?>