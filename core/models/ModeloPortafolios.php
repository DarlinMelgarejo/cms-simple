<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloPortafolios {
    /**
     * Busca la información del portafolio.
     * 
     * @return array Retorna los datos del portafolio.
     */
    public static function getData($id) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM portafolios WHERE usuario_id = :usuario_id");
        $consulta->bindParam(":usuario_id", $id, PDO::PARAM_INT);
        $consulta->execute();
        $resultados = $consulta->fetch(PDO::FETCH_ASSOC);

        return $resultados;
    }

    /**
     * Actualiza los datos esenciales del protafolio
     */
    public static function setData($nombre_completo, $descripcion, $url_foto, $url_cv, $usuario_id) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare(
            "UPDATE portafolios 
            SET nombre_completo = :nombre_completo, 
            descripcion = :descripcion, 
            url_foto = :url_foto, 
            url_cv = :url_cv 
            WHERE usuario_id = :usuario_id"
        );

        $consulta->bindParam(":nombre_completo", $nombre_completo, PDO::PARAM_STR);
        $consulta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
        $consulta->bindParam(":url_foto", $url_foto, PDO::PARAM_STR);
        $consulta->bindParam(":url_cv", $url_cv, PDO::PARAM_STR);
        $consulta->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);

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
