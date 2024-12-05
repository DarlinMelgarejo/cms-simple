<?php
    include_once __DIR__ . "/../core/controllers/ControladorPortafolios.php";

    $portafolio = ControladorPortafolios::getData(Sesion::get("id"));
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi portafolio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href=<?php echo $portafolio["icono_portafolio"] ?> type="image/x-icon">
</head>
<body>
    <?php
        include_once __DIR__ . "/../templates/header.php";
    ?>
    <main>
        <div class="bg-minimal">
            <section class="l-container">
                <div class="flex flex-column flex-row-l items-center justify-between gap-4">
                    <div class="flex flex-column items-center">
                        <h2 class="dark-color"><?php echo $portafolio["nombre_completo"]?></h2>
                        <div class="flex gap-4">
                            <a class="btn btn-white" href="#trabajos-desarrollados">Ver trabajos</a>
                            <a class="btn btn-dark" href="#contacto">Contactar</a>
                        </div>
                    </div>
                    <img class="b-radius-4" src=<?php echo $portafolio["url_foto"]?> alt="<?php echo "Foto de " . $portafolio["nombre_completo"]?>"  title="<?php echo "Foto de " . $portafolio["nombre_completo"]?>" width="700px">
                </div>
            </section>
        </div>
        <div class="bg-light">
            <section class="l-container" id="sobre-mi">
                <div class="py-6">
                    <h2 class="dark-color">Sobre mí</h2>
                    <p class="text-color mb-4"><?php echo $portafolio["descripcion"]?></p>
                    <a class="btn btn-dark" href="<?php echo $portafolio["url_cv"]?>" download>Descargar CV</a>
                </div>
            </section>
        </div>
        <?php
            include_once __DIR__ . "/../core/controllers/ControladorSkills.php";
            $skills = ControladorSkills::getData($portafolio["id"]);
        ?>
        <div class="bg-minimal">
            <section class="l-container" id="skills">
                <div class="py-6">
                    <h2 class="dark-color">Skills</h2>
                    <div class="grid grid-cols-1 grid-cols-m-2 gap-4">
                        <?php
                            foreach ($skills as $skill) {
                        ?>
                            <div class="card show">
                                <h3><?php echo $skill["nombre"]?></h3>
                                <p><?php echo $skill["descripcion"]?></p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <?php
            include_once __DIR__ . "/../core/controllers/ControladorServicios.php";
            $servicios = ControladorServicios::getData($portafolio["id"]);
        ?>
        <div class="bg-light">
            <section class="l-container" id="servicios">
                <div class="py-6">
                    <h2 class="dark-color">Servicios</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <?php
                            foreach ($servicios as $servicio) {
                        ?>
                            <div class="card show">
                                <h3><?php echo $servicio["nombre"]?></h3>
                                <p><?php echo $servicio["descripcion"]?></p>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <?php
            include_once __DIR__ . "/../core/controllers/ControladorTrabajosDesarrollados.php";
            $trabajos_desarrollados = ControladorTrabajosDesarrollados::getData($portafolio["id"]);
        ?>
        <div class="bg-minimal">
            <section class="l-container" id="trabajos-desarrollados">
                <div class="py-6">
                    <h2 class="dark-color">Trabajos Desarrollados</h2>
                    <div class="grid grid-cols-1 grid-cols-s-2 grid-cols-m-3 gap-4 m-auto">
                        <?php
                            foreach ($trabajos_desarrollados as $trabajo_desarrollado) {
                        ?>
                            <figure class="card-figure">
                                <img src=<?php echo $trabajo_desarrollado["url_foto_trabajo"]?> alt="Proyecto" class="card-image" width="500px" height="500px">
                                <figcaption class="card-overlay">
                                    <div class="flex flex-column justify-center">
                                        <h4 class="white-color"><?php echo $trabajo_desarrollado["nombre"]?></h4>
                                        <div class="flex flex-row justify-center items-center gap-4">
                                            <a href=<?php echo $trabajo_desarrollado["url_trabajo_desplegado"]?> target="_blank" class="card-button" title="Ver proyecto">
                                                <img src="assets/images/icon/external_link.svg" alt="Icono de link externo">
                                            </a>
                                            <a href=<?php echo $trabajo_desarrollado["url_trabajo_github"]?> target="_blank" class="card-button" title="GitHub">
                                                <img src="assets/images/icon/github.svg" alt="Icono de repositorio en Github">
                                            </a>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
        <?php
            include_once __DIR__ . "/../core/controllers/ControladorContactos.php";
            $contactos = ControladorContactos::getData();
        ?>
        <div class="bg-light">
            <section class="l-container" id="contacto">
                <div class="py-6">
                    <h2 class="dark-color">Contacto</h2>
                    <div class="flex justify-center items-center gap-6">
                        <?php
                            foreach ($contactos as $contacto) {
                                $icono_contacto = "#";
                                $link_contacto = "#";
                                switch ($contacto["tipo_contacto"]) {
                                    case "email":
                                        $icono_contacto = "assets/images/icon/mail.svg";
                                        $link_contacto = "mailto:" . $contacto["enlace_contacto"] . "?subject=Asunto-del-correo&body=Texto-del-cuerpo";
                                        break;

                                    case "linkedin":
                                        $icono_contacto = "assets/images/icon/linkedin.svg";
                                        $link_contacto = $contacto["enlace_contacto"];
                                        break;

                                    case "github":
                                        $icono_contacto = "assets/images/icon/github.svg";
                                        $link_contacto = $contacto["enlace_contacto"];
                                        break;
                                    
                                    default:
                                        $icono_contacto = "#";
                                        break;
                                }
                        ?>
                            <a href=<?php echo $link_contacto ?> target="_blank"><img src=<?php echo $icono_contacto ?> alt=<?php echo "Icono de " . $contacto["tipo_contacto"]?> width="36px" height="36px"></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>