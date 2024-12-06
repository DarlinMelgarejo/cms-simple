# CMS Simple

**CMS Simple** es una herramienta sencilla y rápida para personalizar tu portafolio sin necesidad de escribir mucho código. Permite cargar tu foto, agregar tu CV en formato PDF, listar tus habilidades, mostrar los servicios que ofreces, compartir tus trabajos anteriores y proporcionar tus datos de contacto como email, LinkedIn y GitHub.

## Tabla de Contenidos

- [Descripción](#descripción)
- [Tecnologías](#tecnologías)
- [Instalación](#instalación)
- [Uso](#uso)
- [Adicional](#adicional)

## Descripción

Este proyecto tiene como objetivo ofrecer una manera fácil de crear y administrar un portafolio personal. **CMS Simple** permite que puedas cargar tu foto, CV en formato PDF, añadir tus habilidades, mostrar los servicios que ofreces, listar tus trabajos previos y agregar tus datos de contacto (email, LinkedIn, GitHub). Todo esto desde un sistema de gestión sencillo y accesible.

## Tecnologías

Este proyecto fue desarrollado utilizando las siguientes tecnologías y herramientas:

- **PHP 8.3.10**: Lenguaje de programación utilizado para la lógica del servidor.
- **XAMPP**: Paquete de software que incluye Apache, MySQL y PHP, utilizado para ejecutar el servidor localmente.
- **MySQL**: Sistema de gestión de bases de datos para almacenar la información del usuario, servicios, habilidades y más.

## Instalación

Para instalar y configurar **CMS Simple** en tu máquina local, sigue estos pasos:

1. **Clona el repositorio:**
git clone https://github.com/tu-usuario/cms-simple.git

2. **Crea la base de datos en MySQL:**
- Dentro del proyecto, encontrarás el archivo `script.sql` en la carpeta `/database`. Copia todo el código SQL de este archivo y ejecútalo en tu base de datos MySQL a través de XAMPP para crear las tablas necesarias.

3. **Agrega datos de prueba:**
- Luego, copia el código del archivo `data.sql` (también en la carpeta `/database`) y ejecútalo para insertar datos de prueba en las tablas. Esto te permitirá acceder al dashboard del CMS Simple.

## Uso

Una vez que tengas todo listo, sigue estos pasos para usar el CMS Simple:

1. **Inicia el servidor local:**
Abre Git Bash en la raíz del proyecto y ejecuta el siguiente comando para iniciar el servidor:
php -S localhost:8000

2. **Accede al sistema:**
- Visita `http://localhost:8000` en tu navegador. Te pedirá que inicies sesión con las siguientes credenciales predeterminadas pero se pueden modificar en el archivo `data.sql`:
  - **Correo:** tu.correo@gmail.com
  - **Contraseña:** 12345678

3. **Personaliza tu portafolio:**
- Una vez dentro del dashboard, puedes modificar tu nombre, foto, CV, habilidades, servicios y trabajos desarrollados.

4. **Visualiza tu portafolio:**
- Para ver el portafolio en vivo, simplemente haz clic en el ícono del ojo ubicado en la parte superior derecha del panel de administración. Esto abrirá tu portafolio en una nueva ventana.

## Adicional

### Personalización de estilos

Si deseas editar los estilos del sistema o del portafolio, puedes hacerlo de manera sencilla ejecutando el siguiente comando en tu terminal:

sass --watch assets/scss/styles.scss:assets/css/styles.css

Este comando compilará el archivo SCSS (`styles.scss`) en un solo archivo CSS (`styles.css`). Puedes modificar los estilos cambiando las variables en el archivo SCSS, agregando nuevos componentes o ajustando los colores según tus preferencias.

---

¡Eso es todo! Con **CMS Simple** puedes personalizar y gestionar tu portafolio de manera rápida y eficiente, sin complicarte con programación avanzada.