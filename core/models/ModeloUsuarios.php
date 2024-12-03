<?php

require_once __DIR__ . "/../config/Database.php";

class ModeloUsuarios {
    /**
     * Busca un usuario por su email.
     * 
     * @param string $email Email del usuario.
     * @return array|null Retorna los datos del usuario si existe, o null si no.
     */
    public static function getByEmail($email) {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM usuarios WHERE email = :email");
        $consulta->bindParam(':email', $email, PDO::PARAM_STR);
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC) ?: null;
    }
    
    /**
     * Busca un primer usuario.
     * 
     * @return array|null Retorna los datos del usuario si existe, o null si no.
     */
    public static function getFirst() {
        $conexion = new ConexionBD();
        $conexion->conectar();
        $bd = $conexion->getConexion();

        $consulta = $bd->prepare("SELECT * FROM usuarios WHERE id = 1");
        $consulta->execute();

        return $consulta->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}

?>
