-- Insertar usuario con contraseña igual a 12345678
INSERT INTO usuarios(email, password, nombres, apellidos) VALUES
('tu.correo@gmail.com', '$2y$10$J9.lJOsrHohhhtZP1ps3uG69KPQ.98vIS1wTwntQ.JkEK26g3XslK', 'Nombres', 'Apellidos');

-- Insertar portafolio
INSERT INTO portafolios(usuario_id, nombre_completo, descripcion) VALUES
(1, 'Tu nombre', 'Soy un desarrollador web apasionado por crear experiencias digitales únicas y funcionales. Con más de 5 años de experiencia en el campo, me especializo en tecnologías frontend y tengo un ojo agudo para el diseño y la usabilidad. Mi enfoque está en crear aplicaciones web interactivas y accesibles que no solo resuelvan problemas, sino que también ofrezcan una experiencia de usuario intuitiva y agradable.');

-- Insertar skills
INSERT INTO skills (portafolio_id, nombre, descripcion) VALUES 
(1, 'JavaScript', 'Desarrollo de aplicaciones interactivas y dinámicas utilizando JavaScript, el lenguaje de programación más popular en la web.'),
(1, 'HTML/CSS', 'Maquetación semántica y diseño responsivo utilizando HTML5 y CSS3. Mi enfoque en la creación de páginas web accesibles y bien estructuradas asegura que cada página sea fácil de navegar, tanto en dispositivos de escritorio como móviles.'),
(1, 'React', 'Creación de interfaces de usuario modernas y eficientes con React.js, uno de los frameworks más populares para construir aplicaciones de una sola página. React permite crear interfaces rápidas y reutilizables mediante componentes que gestionan su propio estado.'),
(1, 'Node.js', 'Desarrollo de APIs RESTful y aplicaciones de servidor con Node.js, un entorno de ejecución basado en JavaScript que permite crear aplicaciones escalables y rápidas.');

-- Insertar servicios
INSERT INTO servicios (portafolio_id, nombre, descripcion) VALUES
(1, 'Desarrollo Frontend', 'Ofrezco soluciones de desarrollo frontend enfocadas en crear interfaces de usuario dinámicas, interactivas y visualmente atractivas. Utilizo tecnologías modernas como React, Vue.js y Angular, para crear aplicaciones web rápidas y fáciles de usar.'),
(1, 'Desarrollo Backend', 'Desarrollo de soluciones backend escalables y seguras utilizando Node.js, Express.js y otras tecnologías de servidor. Me especializo en crear APIs RESTful que permiten la integración eficiente de servicios y aplicaciones.');

-- Insertar trabajos desarrollados
INSERT INTO trabajos_desarrollados (portafolio_id, nombre, descripcion, url_foto_trabajo, url_trabajo_github, url_trabajo_desplegado) VALUES
(1, 'Aplicación de Gestión de Tareas', 'Una aplicación web innovadora para la gestión de tareas y proyectos, diseñada para facilitar la organización personal y en equipo.', 'assets/images/placeholder-image.jpg', 'https://github.com/tu-nombre/tareas-app', 'https://tareasapp.com'),
(1, 'Portfolio Personal', 'Este es mi portafolio personal donde muestro una selección de proyectos en los que he trabajado. El sitio web fue diseñado para ser una representación interactiva de mis habilidades como desarrollador web, y presenta tanto mis proyectos de desarrollo frontend como backend.', 'assets/images/placeholder-image.jpg', 'https://github.com/tu-nombre/portfolio', 'https://tu-nombre.dev');

-- Insertar contactos
INSERT INTO contactos (portafolio_id, tipo_contacto, enlace_contacto, titulo_enlace) VALUES
(1, 'email', 'dymm.latino4@gmail.com', 'No dudes en enviarme un correo si tienes alguna pregunta sobre mis proyectos o te interesa trabajar conmigo.'),
(1, 'linkedin', 'https://www.linkedin.com/in/tu-nombre-yeilin', 'Conéctate conmigo en LinkedIn para seguir mis actualizaciones profesionales.'),
(1, 'github', 'https://github.com/tu-nombre', 'Echa un vistazo a mi perfil de GitHub para explorar algunos de mis proyectos.');
