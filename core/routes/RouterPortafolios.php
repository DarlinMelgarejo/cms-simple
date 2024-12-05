<?php
include_once __DIR__ . "/../controllers/ControladorPortafolios.php";

class RouterPortafolios {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "editar":
                ControladorPortafolios::setData();
                break;
        }
    }
}
?>