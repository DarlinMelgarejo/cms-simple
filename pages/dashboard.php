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
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-trabajos-desarrollados')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Trabajos Desarrollados</span>
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

                $portafolio = ControladorPortafolios::getData(Sesion::get("id"));
            ?>
            <section class="card show" id="seccion-portafolio">
                <h2>Editar Información del Portafolio</h2>
                <form action="/portafolio/editar" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-column gap-4 mb-4">
                        <label class="form-label" for="foto">Foto</label>
                        <div class="flex flex-row items-center gap-4">
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto('foto')"><img class="icon__border" src="../assets/images/svg/upload_file.svg" alt="Icono de foto"></button>
                            <input type="file" name="foto" id="foto"  accept=".png, .jpg, .jpeg">
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto('foto')">Subir foto</button>
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
                <h2>Agregar o Eliminar Skills</h2>
                <form class="mb-4" action="/skills/agregar" method="POST">
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre de la skill que maneja" required>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción de la skill" rows="3" required></textarea>
                    </div>
                    <div class="flex justify-start">
                        <input type="hidden" name="portafolio_id" value=<?php echo $portafolio["id"]?>>
                        <button class="btn" type="submit">Agregar</button>
                    </div>
                </form>
                <?php
                    include_once __DIR__ . "/../core/controllers/ControladorSkills.php";
                    $skills = ControladorSkills::getData($portafolio["id"]);
                ?>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($skills as $skill){
                    ?>
                        <tr>
                            <td><?php echo $skill["id"]?></td>
                            <td><?php echo $skill["nombre"]?></td>
                            <td><?php echo $skill["descripcion"]?></td>
                            <td><a class="btn" href="/skills/eliminar/?id=<?php echo urlencode($skill['id'])?>">Eliminar</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </section>
            <section class="card" id="seccion-servicios">
                <h2>Agregar o Eliminar Servicios</h2>
                <form class="mb-4" action="/servicios/agregar" method="POST">
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del servicio que brinda" required>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del servicio" rows="3" required></textarea>
                    </div>
                    <div class="flex justify-start">
                        <input type="hidden" name="portafolio_id" value=<?php echo $portafolio["id"]?>>
                        <button class="btn" type="submit">Agregar</button>
                    </div>
                </form>
                <?php
                    include_once __DIR__ . "/../core/controllers/ControladorServicios.php";
                    $servicios = ControladorServicios::getData($portafolio["id"]);
                ?>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($servicios as $servicio){
                    ?>
                        <tr>
                            <td><?php echo $servicio["id"]?></td>
                            <td><?php echo $servicio["nombre"]?></td>
                            <td><?php echo $servicio["descripcion"]?></td>
                            <td><a class="btn" href="/servicios/eliminar/?id=<?php echo urlencode($servicio['id'])?>">Eliminar</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </section>
            <section class="card" id="seccion-trabajos-desarrollados">
                <h2>Agregar o Eliminar Trabajos Desarrollados</h2>
                <form class="mb-4" action="/trabajos-desarrollados/agregar" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre del trabajo que desarrolló" required>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del trabajo" rows="3" required></textarea>
                    </div>
                    <div class="flex flex-column gap-2 mb-4">
                        <label class="form-label" for="foto_trabajo">Foto Trabajo</label>
                        <div class="flex flex-row items-center gap-4">
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto('foto_trabajo')"><img class="icon__border" src="../assets/images/svg/upload_file.svg" alt="Icono de foto"></button>
                            <input type="file" name="foto_trabajo" id="foto_trabajo"  accept=".png, .jpg, .jpeg" required>
                            <button type="button" class="btn btn-white" onclick="seleccionarFoto('foto_trabajo')">Subir foto</button>
                        </div>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">URL Trabajo Github</label>
                        <input class="form-control" type="url" name="url_trabajo_github" id="url_trabajo_github" placeholder="Ingrese la URL del repositorio en Github" required>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">URL Trabajo Desplegado</label>
                        <input class="form-control" type="url" name="url_trabajo_desplegado" id="url_trabajo_desplegado" placeholder="Ingrese la URL del trabajo desplegado" required>
                    </div>
                    <div class="flex justify-start">
                        <input type="hidden" name="portafolio_id" value=<?php echo $portafolio["id"]?>>
                        <button class="btn" type="submit">Agregar</button>
                    </div>
                </form>
                <?php
                    include_once __DIR__ . "/../core/controllers/ControladorTrabajosDesarrollados.php";
                    $trabajos_desarrollados = ControladorTrabajosDesarrollados::getData($portafolio["id"]);
                ?>
                <table>
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                    <?php
                        foreach($trabajos_desarrollados as $trabajo_desarrollado){
                    ?>
                        <tr>
                            <td><?php echo $trabajo_desarrollado["id"]?></td>
                            <td><?php echo $trabajo_desarrollado["nombre"]?></td>
                            <td><?php echo $trabajo_desarrollado["descripcion"]?></td>
                            <td><a class="btn" href="/trabajos-desarrollados/eliminar/?id=<?php echo urlencode($trabajo_desarrollado['id'])?>">Eliminar</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </section>
            <section class="card" id="seccion-contactos">
                <h2>Editar Pie de Página</h2>
            </section>
        </main>
    </div>
    <script>
        const seleccionarFoto = (id) => {
            document.getElementById(id).click()
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
    </script>
</body>
</html>