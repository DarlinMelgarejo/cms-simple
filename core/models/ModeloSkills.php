<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloSkills {
    /**
     * Busca la información de las skills.
     * 
     * @return array|null Retorna los datos de las skills si existen, o null si no.
     */
    public static function getData() {
        // Crear la conexión
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        // Consulta para obtener todas las skills con portafolio_id = 1
        $consulta = $bd->query("SELECT * FROM skills WHERE portafolio_id = 1");

        // Ejecutar la consulta
        $consulta->execute();

        // Retornar todos los registros (fetchAll devuelve un array con todos los resultados)
        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Si hay resultados, los devuelve; si no, devuelve null
        return $resultados ?: null;
    }
}

?>
