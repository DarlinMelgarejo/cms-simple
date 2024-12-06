<?php
include_once __DIR__ . "/../controllers/ControladorContactos.php";

class RouterContactos {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "editar":
                ControladorContactos::setData();
                break;
        }
    }
}
?>