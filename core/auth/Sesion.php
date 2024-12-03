<?php

class Sesion {
    /**
     * Inicia la sesión si aún no está iniciada.
     */
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Establece un valor en la sesión.
     * 
     * @param string $key Clave para el dato en la sesión.
     * @param mixed $value Valor a almacenar.
     */
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }

    /**
     * Obtiene un valor de la sesión.
     * 
     * @param string $key Clave para el dato en la sesión.
     * @return mixed|null Retorna el valor si existe, o null si no.
     */
    public static function get($key) {
        self::start();
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    /**
     * Verifica si un valor está establecido en la sesión.
     * 
     * @param string $key Clave a verificar.
     * @return bool Retorna true si la clave existe, false si no.
     */
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }

    /**
     * Elimina un valor de la sesión.
     * 
     * @param string $key Clave del valor a eliminar.
     */
    public static function remove($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * Cierra la sesión actual y elimina todos los datos.
     */
    public static function destroy() {
        self::start();
        session_unset();
        session_destroy();
    }

    /**
     * Verifica si el usuario ha iniciado sesión.
     * 
     * @return bool Retorna true si hay un usuario autenticado, false si no.
     */
    public static function isAuthenticated() {
        return self::has('id');
    }
}

?>
