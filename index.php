<?php
    require_once __DIR__ . "/core/config/Config.php";
    require_once __DIR__ . "/core/auth/Sesion.php";
    require_once __DIR__ . "/core/routes/RouterUsuarios.php";
    require_once __DIR__ . "/core/routes/RouterPortafolios.php";
    require_once __DIR__ . "/core/routes/RouterSkills.php";
    require_once __DIR__ . "/core/routes/RouterServicios.php";
    require_once __DIR__ . "/core/routes/RouterTrabajosDesarrollados.php";

    $ruta = $_SERVER["REQUEST_URI"];

    $ruta = parse_url($ruta, PHP_URL_PATH);
    $partesRuta = explode('/', $ruta);

    if (count($partesRuta) >= 3) {
        switch ($partesRuta[1]) {
            case "usuarios":
                RouterUsuarios::redireccionar($partesRuta[2]);
                break;
            
            case "portafolio":
                RouterPortafolios::redireccionar($partesRuta[2]);
                break;
            
            case "skills":
                RouterSkills::redireccionar($partesRuta[2]);
                break;

            case "servicios":
                RouterServicios::redireccionar($partesRuta[2]);
                break;

            case "trabajos-desarrollados":
                RouterTrabajosDesarrollados::redireccionar($partesRuta[2]);
                break;
            
            default:
                echo "ESTA PAGINA NO EXISTE";
                echo "<br>" . count($partesRuta);
                break;
        }
    } else if (count($partesRuta) == 2) {
        switch ($partesRuta[1]) {
            case "":
                if (!Sesion::isAuthenticated()) {
                    header("location: /login");
                }

                include_once __DIR__ . "/pages/view.php";
                break;

            case "login":
                if (Sesion::isAuthenticated()) {
                    header("location: /dashboard");
                }

                include_once __DIR__ . "/pages/login.php";
                break;
            
            case "dashboard":
                if (!Sesion::isAuthenticated()) {
                    header("location: /login");
                }
                
                include_once __DIR__ . "/pages/dashboard.php";
                break;

            default:
                include_once __DIR__ . "/pages/error.php";
                break;
        }
        //echo password_hash("12345678", PASSWORD_BCRYPT);
    }

?>