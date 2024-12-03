<?php
    include_once __DIR__ . "/../core/controllers/ControladorPortafolios.php";

    $portafolio = ControladorPortafolios::data();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi portafolio</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
    <?php
        include_once __DIR__ . "/../templates/header.php";
    ?>
    <main>
        <?php
            include_once __DIR__ . "/../templates/banner.php";
        ?>
        <div class="bg-light">
            <section class="l-container" id="sobre-mi">
                <div class="py-6">
                    <h2 class="dark-color">Sobre mí</h2>
                    <p class="text-color mb-4"><?php echo $portafolio["descripcion"]?></p>
                    <a class="btn btn-dark" href=<?php echo $portafolio["url_cv"]?> download>Descargar CV</a>
                </div>
            </section>
        </div>
        <?php
            include_once __DIR__ . "/../core/controllers/ControladorSkills.php";
            $skills = ControladorSkills::data();
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
            include_once __DIR__ . "/../core/controllers/ControladorSkills.php";
            $skills = ControladorSkills::data();
        ?>
        <div class="bg-light">
            <section class="l-container" id="servicios">
                <div class="py-6">
                    <h2 class="dark-color">Servicios</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="card show">
                            <h3>Frontend Developer</h3>
                            <p>especializado en HTML, CSS, JavaScript y React para contruir sitios web rápidos y accesibles. Mi enfoque se centra en crear interfaces de usuario intuitivas y responsivas que ofrezacan una excelente experiencia al usuario en todos los dispositivos.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-minimal">
            <section class="l-container" id="trabajos-recientes">
                <div class="py-6">
                    <h2 class="dark-color">Trabajos recientes</h2>
                    <div class="grid grid-cols-1 grid-cols-s-2 grid-cols-m-3 gap-4 m-auto">
                        <figure class="card-figure">
                            <img src="/assets/images/placeholder-image.jpg" alt="Proyecto" class="card-image" width="500px" height="500px">
                            <figcaption class="card-overlay">
                                <a href="#" target="_blank" class="card-button" title="Ver proyecto">
                                    <img src="assets/images/icon/external_link.svg" alt="Icono de link externo">
                                </a>
                                <a href="#" target="_blank" class="card-button" title="GitHub">
                                    <img src="assets/images/icon/github.svg" alt="Icono de repositorio en Github">
                                </a>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-light">
            <section class="l-container" id="contacto">
                <div class="py-6">
                    <h2 class="dark-color">Contacto</h2>
                    <div class="flex justify-center items-center gap-6">
                        <a href="" target="_blank"><img src="assets/images/icon/mail.svg" alt="Icono de correo" width="36px" height="36px"></a>
                        <a href="" target="_blank"><img src="assets/images/icon/linkedin.svg" alt="Icono de correo" width="36px" height="36px"></a>
                        <a href="" target="_blank"><img src="assets/images/icon/github.svg" alt="Icono de correo" width="36px" height="36px"></a>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>