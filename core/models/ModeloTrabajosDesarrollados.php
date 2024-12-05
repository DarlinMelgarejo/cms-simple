<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloTrabajosDesarrollados {
    /**
     * Busca la información de los trabajos desarrollados.
     * 
     * @return array Retorna los datos de los trabajos desarrollados
     */
    public static function getData($id) {
        // Crear la conexión
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM trabajos_desarrollados WHERE portafolio_id = :portafolio_id");
        $consulta->bindParam(":portafolio_id", $id, PDO::PARAM_INT);
        $consulta->execute();

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Si hay resultados, los devuelve; si no, devuelve null
        return $resultados;
    }

    /**
     * Registra los datos del trabajo desarrollado
     */
    public static function setData($portafolio_id, $nombre, $descripcion, $url_foto_trabajo, $url_trabajo_github, $url_trabajo_desplegado) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("INSERT INTO trabajos_desarrollados(portafolio_id, nombre, descripcion, url_foto_trabajo, url_trabajo_github, url_trabajo_desplegado) VALUES (:portafolio_id, :nombre, :descripcion, :url_foto_trabajo, :url_trabajo_github, :url_trabajo_desplegado)");

        $consulta->bindParam(":portafolio_id", $portafolio_id, PDO::PARAM_INT);
        $consulta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $consulta->bindParam(":url_foto_trabajo", $url_foto_trabajo, PDO::PARAM_STR);
        $consulta->bindParam(":url_trabajo_github", $url_trabajo_github, PDO::PARAM_STR);
        $consulta->bindParam(":url_trabajo_desplegado", $url_trabajo_desplegado, PDO::PARAM_STR);

        $resultado = $consulta->execute();
        $consulta->closeCursor();

        if ($resultado) {
            header("location: /dashboard");
            exit();
        } else {
            header("location: /dashboard/error");
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

        $consulta = $bd->prepare("DELETE FROM trabajos_desarrollados WHERE id = :id");

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
