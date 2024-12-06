<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloContactos {
    /**
     * Busca la información de los contactos.
     * 
     * @return array Retorna los datos de contactos
     */
    public static function getData($id) {
        // Crear la conexión
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM contactos WHERE portafolio_id = :portafolio_id");
        $consulta->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $consulta->execute();

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    public static function setData($id, $email, $linkedin, $github) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consultaEmail = $bd->prepare(
            "UPDATE contactos 
            SET enlace_contacto = :enlace_contacto
            WHERE portafolio_id = :portafolio_id AND tipo_contacto = 'email'"
        );
        $consultaEmail->bindParam(":enlace_contacto", $email, PDO::PARAM_STR);
        $consultaEmail->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $resultadoEmail = $consultaEmail->execute();
        $consultaEmail->closeCursor();

        echo $resultadoEmail . "<br>";
        
        $consultaLinkedin = $bd->prepare(
            "UPDATE contactos 
            SET enlace_contacto = :enlace_contacto
            WHERE portafolio_id = :portafolio_id AND tipo_contacto = 'linkedin'"
        );
        $consultaLinkedin->bindParam(":enlace_contacto", $linkedin, PDO::PARAM_STR);
        $consultaLinkedin->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $resultadoLinkedin = $consultaLinkedin->execute();
        $consultaLinkedin->closeCursor();

        echo $resultadoLinkedin . "<br>";
        
        $consultaGithub = $bd->prepare(
            "UPDATE contactos 
            SET enlace_contacto = :enlace_contacto
            WHERE portafolio_id = :portafolio_id AND tipo_contacto = 'github'"
        );
        $consultaGithub->bindParam(":enlace_contacto", $github, PDO::PARAM_STR);
        $consultaGithub->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $resultadoGithub = $consultaGithub->execute();
        $consultaGithub->closeCursor();
        
        echo $resultadoGithub . "<br>";

        $resultados = $resultadoEmail && $resultadoLinkedin && $resultadoGithub;

        
        if ($resultados) {
            header("location: /dashboard");
            exit();
        } else {
            header("location: /error");
            exit();
        }
    }
}

?>
