<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloPortafolios {
    /**
     * Busca la información del portafolio.
     * 
     * @return array|null Retorna los datos del portafolio si existe, o null si no.
     */
    public static function getData() {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM portafolios WHERE usuario_id = 1");
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}

?>
