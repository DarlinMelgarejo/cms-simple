INSERT INTO usuarios(email, password, nombres, apellidos) VALUES
('dymm.latino4@gmail.com', '$2y$10$J9.lJOsrHohhhtZP1ps3uG69KPQ.98vIS1wTwntQ.JkEK26g3XslK', 'Darlin Yeilin', 'Melgarejo Miranda');

INSERT INTO portafolios(usuario_id, nombre_completo, descripcion) VALUES
(1, "Darlin Yeilin Melgarejo Miranda", "Soy un desarrollador web apasionado por crear experiencias digitales únicas y funcionales. Con más de 5 años de experiencia en el campo, me especializo en tecnologías frontend y tengo un ojo agudo para el diseño y la usabilidad.");

INSERT INTO skills (portafolio_id, nombre, descripcion) VALUES 
(1, 'JavaScript', 'Desarrollo de aplicaciones interactivas y dinámicas'),
(1, 'HTML/CSS', 'Maquetación semántica y diseño responsivo'),
(1, 'React', 'Creación de interfaces de usuario modernas y eficientes'),
(1, 'Node.js', 'Desarrollo de APIs RESTful y aplicaciones de servidor');

-- Insertar un ejemplo de proyecto
INSERT INTO proyectos (usuario_id, nombre, descripcion, imagen_proyecto, fecha_inicio, fecha_termino, url_proyecto)
VALUES 
    (1, 'Portafolio Personal', 'Portafolio web personal para mostrar mis trabajos y habilidades.', 'assets/images/proyecto1.jpg', '2023-01-01', '2023-06-01', 'https://miportafolio.com');

-- Insertar trabajos recientes
INSERT INTO trabajos_recientes (usuario_id, nombre, descripcion, url_trabajo)
VALUES
    (1, 'Desarrollo de sitio web para cliente X', 'Creación de un sitio web responsive para la empresa X.', 'https://trabajoreciente.com/proyecto-x');

-- Insertar un contacto para el portafolio
INSERT INTO contactos (usuario_id, tipo_contacto, enlace_contacto)
VALUES 
    (1, 'email', 'darlin@example.com'),
    (1, 'linkedin', 'https://www.linkedin.com/in/darlinmelgarejo'),
    (1, 'github', 'https://github.com/darlinmelgarejo');
