<?php
    require_once __DIR__ . "/core/config/Config.php";
    require_once __DIR__ . "/core/routes/RouterUsuarios.php";

    $ruta = $_GET["route"] ?? null;
    $accion = $_GET["action"] ?? null;

    if ($ruta && $accion) {
        switch ($ruta) {
            case "usuarios":
                RouterUsuarios::redireccionar($accion);
                break;
            
            case "componentes":
                RouterUsuarios::redireccionar($accion);
                break;
                
            default:
                // include_once "./pages/login.php";
                //include_once "./pages/dashboard.php";
                break;
        }
    } else {
        // // Obtener la URI solicitada
        // $request_uri = $_SERVER['REQUEST_URI'];

        // // Eliminar la barra inicial si existe
        // $request_uri = ltrim($request_uri, '/');
        // echo "<br>" . $request_uri;
        
        // // Dividir la URI por el carácter '/'
        // $partes = explode('/', $request_uri);
        
        // // Obtener la última parte
        // echo "<br>" . $partes[0];
        // echo "<br>" . $partes[1];
        include_once __DIR__ . "/pages/home.php";
        //include_once __DIR__ . "/pages/login.php";
    }
?>