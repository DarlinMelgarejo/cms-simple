-- Creación de la base de datos
CREATE DATABASE IF NOT EXISTS cms_portafolios;
USE cms_portafolios;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL, -- Almacenar en hash
    nombres VARCHAR(255) NOT NULL,
    apellidos VARCHAR(255) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para los portafolios
CREATE TABLE IF NOT EXISTS portafolios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    nombre_completo VARCHAR(255) NOT NULL,                   
    descripcion TEXT NOT NULL,
    icono_portafolio VARCHAR(255) DEFAULT 'assets/images/favicon.ico',
    url_foto VARCHAR(255) DEFAULT 'assets/images/placeholder-image.jpg',
    url_cv VARCHAR(255) DEFAULT 'assets/pdf/cv.pdf',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) -- Llave foránea hacia la tabla de usuarios
);

-- Tabla para los skills del portafolio
CREATE TABLE IF NOT EXISTS skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portafolio_id INT NOT NULL,                             -- Relación con el portafolio
    nombre VARCHAR(255) NOT NULL,                  -- Nombre de la habilidad (Ej. "JavaScript")
    descripcion TEXT NOT NULL,                              -- Descripción de la habilidad
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id) -- Llave foránea hacia la tabla de portafolios
);

CREATE TABLE IF NOT EXISTS habilidades

-- Tabla para los datos SEO del portafolio
CREATE TABLE IF NOT EXISTS seo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portafolio_id INT NOT NULL,                             -- Relación con el portafolio
    seo_titulo VARCHAR(255),                       -- Título SEO (para la etiqueta <title>)
    seo_descripcion TEXT,                          -- Descripción SEO (para la meta descripción)
    seo_palabras_clave TEXT,                       -- Palabras clave SEO
    seo_slug VARCHAR(255),                         -- Slug amigable para la URL
    seo_imagen VARCHAR(255),                       -- Imagen destacada SEO
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id) -- Llave foránea hacia la tabla de portafolios
);

-- Tabla para los trabajos recientes
CREATE TABLE IF NOT EXISTS trabajos_recientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portafolio_id INT NOT NULL,                             -- Relación con el portafolio
    nombre VARCHAR(255) NOT NULL,                   -- Nombre del trabajo reciente
    descripcion TEXT,                              -- Descripción del trabajo reciente
    url_trabajo VARCHAR(255),                      -- Enlace al trabajo reciente
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Fecha de creación del trabajo
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id) -- Llave foránea hacia la tabla de portafolios
);

-- Tabla para los contactos de un portafolio
CREATE TABLE IF NOT EXISTS contactos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portafolio_id INT NOT NULL,                             -- Relación con el portafolio
    tipo_contacto ENUM('email', 'linkedin', 'github', 'otro') NOT NULL,  -- Tipo de contacto (email, LinkedIn, GitHub, etc.)
    enlace_contacto VARCHAR(255) NOT NULL,         -- Enlace o dirección del contacto
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id) -- Llave foránea hacia la tabla de portafolios
);