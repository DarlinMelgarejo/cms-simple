<?php
    require_once __DIR__ . "/core/config/Config.php";
    require_once __DIR__ . "/core/routes/RouterUsuarios.php";

    $ruta = $_SERVER["REQUEST_URI"];
    $metodo = $_SERVER["REQUEST_METHOD"];

    $ruta = parse_url($ruta, PHP_URL_PATH);
    $partesRuta = explode('/', $ruta);

    if (count($partesRuta) == 3) {
        switch ($partesRuta[1]) {
            case "usuarios":
                RouterUsuarios::redireccionar($partesRuta[2]);
                break;
            
            case "usuarios":
                RouterUsuarios::redireccionar($partesRuta[2]);
                break;
            
            default:
                echo "ESTA PAGINA NO EXISTE";
                echo "<br>" . count($partesRuta);
                break;
        }
    } else if (count($partesRuta) == 2) {
        switch ($partesRuta[1]) {
            case "":
                include_once __DIR__ . "/pages/home.php";
                break;

            case "login":
                include_once __DIR__ . "/pages/login.php";
                break;
            
            case "dashboard":
                include_once __DIR__ . "/pages/dashboard.php";
                break;
        }
        //echo password_hash("12345678", PASSWORD_BCRYPT);
    }

?>