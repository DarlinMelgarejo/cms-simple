<?php
require_once __DIR__ . "/../auth/Sesion.php";
require_once __DIR__ . "/../models/ModeloUsuarios.php"; // Modelo para interactuar con la tabla "usuarios"

class ControladorUsuarios {
    public static function login() {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($email) || empty($password)) {
            header('Location: index.php');
            exit();
        }

        $usuario = ModeloUsuarios::getByEmail($email); // Método en el modelo para buscar usuario por email

        if ($usuario && password_verify($password, $usuario["password"])) {
            // Contraseña válida, iniciar sesión
            Sesion::start();
            Sesion::set("id", $usuario["id"]);
            Sesion::set("usuario", $usuario["nombres"] . " " . $usuario["apellidos"]);
            Sesion::set("email", $usuario["email"]);
            header("Location: index.php?route=usuarios&action=dashboard");
        } else {
            error_log("La contraseña del usuario " . $usuario["nombres"] . " " . $usuario["apellidos"] . " es incorrecta.");
            header("Location: index.php?route=usuarios&action=login");
        }
    }

    public static function me() {
        $usuario = ModeloUsuarios::getFirst();
        return $usuario;
    }

    public static function dashboard() { 
        if (Sesion::isAuthenticated()) {
            include_once __DIR__ . "/../auth/Sesion.php";
            include_once __DIR__ . "/../../pages/dashboard.php";
        } else {
            include_once __DIR__ . "/../../pages/login.php";
        }
    }

    public static function logout() {
        Sesion::destroy();
        header("Location: index.php");
        exit();
    }
}

?>
