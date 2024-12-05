<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloSkills {
    /**
     * Busca la información de las skills.
     * 
     * @return array Retorna los datos de las skills.
     */
    public static function getData($id) {
        // Crear la conexión
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM skills WHERE portafolio_id = :portafolio_id");
        $consulta->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $consulta->execute();

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }

    /**
     * Actualiza los datos esenciales del protafolio
     */
    public static function setData($portafolio_id, $nombre, $descripcion) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("INSERT INTO skills (portafolio_id, nombre, descripcion) VALUES (:portafolio_id, :nombre, :descripcion)");

        $consulta->bindParam(":portafolio_id", $portafolio_id, PDO::PARAM_INT);
        $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);

        $resultado = $consulta->execute();
        $consulta->closeCursor();

        if ($resultado) {
            header("location: /dashboard");
            exit();
        } else {
            header("location: /dashboard");
            exit();
        }
    }

    /**
     * Elimina el registro con el id que se le pasa
     */

    public static function delete($id) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("DELETE FROM skills WHERE id = :id");

        $consulta->bindParam(":id", $id, PDO::PARAM_INT);

        $resultado = $consulta->execute();
        $consulta->closeCursor();

        if ($resultado) {
            header("location: /dashboard");
            exit();
        } else {
            header("location: /dashboard");
            exit();
        }
    }
}

?>
