<?php
require_once __DIR__ . "/../models/ModeloTrabajosDesarrollados.php"; // Modelo para interactuar con la tabla "trabajos desarrollados"

class ControladorTrabajosDesarrollados {
    public static function getData($id) {
        try {
            $trabajos_desarrollados = ModeloTrabajosDesarrollados::getData($id);
            return $trabajos_desarrollados;
        } catch (\Error $error) {
            error_log($error);
        }
    }

    public static function setData() {
        try {
            // Obtener datos del formulario
            $portafolio_id = filter_input(INPUT_POST, "portafolio_id", FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_SPECIAL_CHARS);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_SPECIAL_CHARS);
            $url_trabajo_github = filter_input(INPUT_POST, "url_trabajo_github", FILTER_SANITIZE_URL);
            $url_trabajo_desplegado = filter_input(INPUT_POST, "url_trabajo_desplegado", FILTER_SANITIZE_URL);
            
            // Archivos subidos
            $foto_trabajo = $_FILES['foto_trabajo'];

            // Ruta de destino de los archivos
            $rutaImagen = "assets/images/";

            if (isset($foto_trabajo) && $foto_trabajo['error'] == UPLOAD_ERR_OK) {
            
                $fotoTmp = $foto_trabajo['tmp_name'];
                $fotoExtension = pathinfo($foto_trabajo['name'], PATHINFO_EXTENSION);
                $fotoNombre = uniqid('foto_', true) . '.' . $fotoExtension;
                $url_foto_trabajo = $rutaImagen . $fotoNombre;
                
                // Verificar que el archivo es una imagen
                if (getimagesize($fotoTmp)) {
                    if (move_uploaded_file($fotoTmp, $url_foto_trabajo)) {
                        echo "Imagen subida con éxito: $fotoNombre <br>";
                    } else {
                        echo "Error al subir la imagen. <br>";
                    }
                } else {
                    echo "El archivo no es una imagen válida. <br>";
                }
            }
    
            ModeloTrabajosDesarrollados::setData($portafolio_id, $nombre, $descripcion, $url_foto_trabajo, $url_trabajo_github, $url_trabajo_desplegado);
            
        } catch (PDOException $e) {
            error_log($e);
        }
    }

    public static function delete() {
        $skill_id = $_GET["id"];
        $url_foto_trabajo = $_GET["url_foto_trabajo"];

        if ($url_foto_trabajo && $url_foto_trabajo !== "assets/images/placeholder-image.jpg") {
            // Eliminar la foto si existe y no es la imagen placeholder
            if (file_exists($url_foto_trabajo)) {
                unlink($url_foto_trabajo); // Eliminar el archivo anterior
            }
        }

        ModeloTrabajosDesarrollados::delete($skill_id);
    }
}

?>
