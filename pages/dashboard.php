<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="bg-light">
    <header class="main-header">
        <div class="main-header__container">
            <h1 class="main-header__title">CMS Simple</h1>
            <span><?php echo "Bienvenido " . Sesion::get("usuario")?></span>
            <div class="main-header__options">
                <a class="btn btn-white p-1" href="/" target="_blank">
                    <div class="flex items-center h-full">
                        <img class="icon" src="assets/images/svg/view.svg" alt="Icono de visualizar">
                    </div>
                </a>
                <a class="btn btn-white p-1" href="/usuarios/logout">
                    <div class="flex items-center h-full">
                        <img class="icon" src="assets/images/svg/logout.svg" alt="Icono de cerrar sesión">
                    </div>
                </a>
            </div>
        </div>
    </header>
    <div class="flex">
        <nav class="main-nav">
            <ul class="main-nav__menu">
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-portafolio')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Portafolio</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link"onclick="mostrarSeccion('seccion-skills')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Skills</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-servicios')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Servicios</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-trabajos-realizados')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Trabajos Realizados</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-contactos')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Contactos</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main class="l-container w-full">
            <?php
                include_once __DIR__ . "/../core/controllers/ControladorPortafolios.php";

                $portafolio = ControladorPortafolios::getData();
            ?>
            <section class="card show" id="seccion-portafolio">
                <h2>Editar Información del Portafolio</h2>
                <form action="/portafolio/editar" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-column gap-4 mb-4">
                        <label class="form-label" for="foto">Foto</label>
                        <div class="flex flex-row items-center gap-4">
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto()"><img class="icon__border" src="../assets/images/svg/upload_file.svg" alt="Icono de foto"></button>
                            <input type="file" name="foto" id="foto"  accept=".png, .jpg, .jpeg">
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto()">Subir foto</button>
                        </div>
                        <input class="form-control" type="text" name="url_foto" id="url_foto" value="<?php echo $portafolio["url_foto"]?>">
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Nombre Completo</label>
                        <input class="form-control" type="text" name="nombre_completo" id="nombre_completo" placeholder="Ingrese su nombre completo" value="<?php echo $portafolio["nombre_completo"]?>">
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción que saldrá en el portafolio" rows="5"><?php echo $portafolio["descripcion"]?></textarea>
                    </div>
                    <!-- <div class="flex items-center gap-2 mb-4">
                        <input class="switch" type="checkbox" name="mostrar-descripcion" id="switch" onchange="mostrarDescripcion()">
                        <label class="form-label m-0" for="mostrar-descripcion">Mostrar descripción</label>
                    </div>
                    <div class="flex flex-column mb-4 hidden">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del header" rows="3"></textarea>
                    </div> -->
                    <div class="flex flex-column gap-4 mb-4">
                        <label class="form-label" for="cv">CV</label>
                        <div class="flex flex-row items-center gap-4">
                            <input type="file" name="cv" id="cv" accept=".pdf">
                            <div class="flex gap-4">
                                <button type="button" class="btn btn-white" onclick="seleccionarCV()">Subir curriculum en PDF</button>
                                <a class="btn btn-white" href="<?php echo $portafolio["url_cv"]?>" download>Descargar CV</a>
                            </div>
                        </div>
                        <input class="form-control" type="text" name="url_cv" id="url_cv" value="<?php echo $portafolio["url_cv"]?>">
                    </div>
                    <div class="flex justify-start">
                        <button class="btn" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </section>
            <section class="card" id="seccion-skills">
                <h2>Editar Barra de Navegación</h2>
            </section>
            <section class="card" id="seccion-servicios">
                <h2>Editar Banner</h2>
            </section>
            <section class="card" id="seccion-trabajos-realizados">
                <h2>Editar Contenido Principal</h2>
            </section>
            <section class="card" id="seccion-contactos">
                <h2>Editar Pie de Página</h2>
            </section>
        </main>
    </div>
    <script>
        const inputFoto = document.getElementById("foto")
        const seleccionarFoto = () => {
            inputFoto.click()
        }
        
        const inputCV = document.getElementById("cv")
        const seleccionarCV = () => {
            inputCV.click()
        }


        const mostrarSeccion = (seccion) => {
            const seccionAnterior = document.querySelector(".show")
            seccionAnterior.classList.remove("show")

            const seccionActual = document.getElementById(seccion)
            seccionActual.classList.add("show")
        }

        const input_switch = document.getElementById("switch")

        const descripcion = document.querySelector(".hidden")
        const mostrarDescripcion = () => {
            if (input_switch.checked) {
                descripcion.classList.remove("hidden")
            } else {
                descripcion.classList.add("hidden")
            }
        }
    </script>
</body>
</html>