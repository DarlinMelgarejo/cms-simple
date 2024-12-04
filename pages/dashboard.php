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
                <button class="btn btn-primary">+ Agregar Componente</button>
                <button class="btn btn-white p-1">
                    <div class="flex items-center h-full">
                        <img class="icon" src="assets/images/svg/settings.svg" alt="Icono de configuración">
                    </div>
                </button>
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
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-header')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Cabecera</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link"onclick="mostrarSeccion('seccion-nav')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Barra de Navegación</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-banner')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Banner</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-main')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Contenido Principal</span>
                    </a>
                </li>
                <li class="main-nav__item">
                    <a class="main-nav__link" onclick="mostrarSeccion('seccion-footer')">
                        <img class="icon" src="assets/images/svg/component.svg" alt="Icono de componente">
                        <span>Pie de Página</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main class="l-container w-full">
            <section class="card show" id="seccion-header">
                <h2>Editar Encabezado</h2>
                <form class="">
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="logo">Logo</label>
                        <div class="flex flex-row items-center gap-4">
                            <button type="button" class="btn btn-white" onclick="seleccionarLogo()"><img class="icon__border" src="../assets/images/svg/upload_file.svg" alt="Imagen de Logo"></button>
                            <input type="file" name="logo" id="logo" onchange="handleFileChange()">
                            <button type="button" class="btn btn-white" onclick="seleccionarLogo()">Subir logo</button>
                        </div>
                    </div>
                    <div class="flex flex-column mb-4">
                        <label class="form-label" for="titulo">Título</label>
                        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Ingrese el título del header">
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <input class="switch" type="checkbox" name="mostrar-descripcion" id="switch" onchange="mostrarDescripcion()">
                        <label class="form-label m-0" for="mostrar-descripcion">Mostrar descripción</label>
                    </div>
                    <div class="flex flex-column mb-4 hidden">
                        <label class="form-label" for="titulo">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripción del header" rows="3"></textarea>
                    </div>
                    <div class="flex justify-start">
                        <button class="btn" type="submit">Guardar Cambios</button>
                    </div>
                </form>
            </section>
            <section class="card" id="seccion-nav">
                <h2>Editar Barra de Navegación</h2>
            </section>
            <section class="card" id="seccion-banner">
                <h2>Editar Banner</h2>
            </section>
            <section class="card" id="seccion-main">
                <h2>Editar Contenido Principal</h2>
            </section>
            <section class="card" id="seccion-footer">
                <h2>Editar Pie de Página</h2>
            </section>
        </main>
    </div>
    <script>
        const inputLogo = document.getElementById("logo")
        const seleccionarLogo = () => {
            inputLogo.click()
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