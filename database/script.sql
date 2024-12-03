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
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    nombre_completo VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    icono_portafolio VARCHAR(255) DEFAULT 'assets/images/favicon.ico',
    url_foto VARCHAR(255) DEFAULT 'assets/images/placeholder-image.jpg',
    url_cv VARCHAR(255) DEFAULT 'assets/pdf/cv.pdf',
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- Tabla para los skills del portafolio
CREATE TABLE IF NOT EXISTS skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);

CREATE TABLE IF NOT EXISTS servicios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);

-- Tabla para los trabajos desarrollados
CREATE TABLE IF NOT EXISTS trabajos_desarrollados (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT NOT NULL,
    url_foto_trabajo VARCHAR(255) NOT NULL,
    url_trabajo_github VARCHAR(255) NOT NULL,
    url_trabajo_desplegado VARCHAR(255),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);

-- Tabla para los contactos de un portafolio
CREATE TABLE IF NOT EXISTS contactos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portafolio_id INT NOT NULL,
    tipo_contacto ENUM('email', 'linkedin', 'github', 'gitlab') NOT NULL,
    enlace_contacto VARCHAR(255) NOT NULL,
    titulo_enlace VARCHAR(100) NOT NULL,
    FOREIGN KEY (portafolio_id) REFERENCES portafolios(id)
);