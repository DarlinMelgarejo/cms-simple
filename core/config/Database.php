<?php

class ConexionBD {
    private $host = "localhost";
    private $nombreBD = "cms_portafolios";
    private $usuarioBD = "darlin";
    private $contraseñaBD = "R4!2S8KR97-Y]fHy";
    private $bd; // Objeto de la conexión

    // Método para conectar a la base de datos
    public function conectar() {
        try {
            $this->bd = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->nombreBD,
                $this->usuarioBD,
                $this->contraseñaBD,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            // Verificar si la conexión fue exitosa
            if (!$this->bd) {
                error_log("La conexión a la base de datos ha fallado.");
                die("Lo sentimos, ha ocurrido un error al conectarse a la base de datos. Por favor, inténtelo de nuevo más tarde.");
            }

        } catch (PDOException $e) {
            error_log("Problema con la conexión: " . $e->getMessage());
            //echo "Problema con la conexión: " . $e->getMessage();
            header("location: /error");
        }
    }

    // Método para obtener el objeto de la conexión (si es necesario en otras partes del código)
    public function getConexion() {
        return $this->bd;
    }
}
?>
