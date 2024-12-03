<?php
include_once __DIR__ . "/../controllers/ControladorUsuarios.php";

class RouterUsuarios {
    public static function redireccionar($accion) {
        switch ($accion) {
            case "login":
                ControladorUsuarios::login();
                break;

            case "logout":
                ControladorUsuarios::logout();
                break;

            case "dashboard":
                ControladorUsuarios::dashboard();
                break;

            
            default:
                # code...
                break;
        }
    }
}
?>