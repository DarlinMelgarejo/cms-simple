<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloTrabajosDesarrollados {
    /**
     * Busca la información de los trabajos desarrollados.
     * 
     * @return array|null Retorna los datos de los trabajos desarrollados si existen, o null si no.
     */
    public static function getData() {
        // Crear la conexión
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        // Consulta para obtener todos los trabajos desarrollados con portafolio_id = 1
        $consulta = $bd->query("SELECT * FROM trabajos_desarrollados WHERE portafolio_id = 1");

        // Ejecutar la consulta
        $consulta->execute();

        // Retornar todos los registros (fetchAll devuelve un array con todos los resultados)
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Si hay resultados, los devuelve; si no, devuelve null
        return $resultados ?: null;
    }
}

?>
