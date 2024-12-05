    <?php
    require_once __DIR__ . "/../models/ModeloPortafolios.php"; // Modelo para interactuar con la tabla "portafolios"

    class ControladorPortafolios {
        public static function getData() {
            try {
                $usuario = ModeloPortafolios::getData();
                return $usuario;
            } catch (\Error $error) {
                error_log($error);
            }
        }

        public static function setData() {
            try {
                // Obtener datos del formulario
                $nombre_completo = filter_input(INPUT_POST, "nombre_completo", FILTER_SANITIZE_SPECIAL_CHARS);
                $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_SPECIAL_CHARS);
                $url_foto = filter_input(INPUT_POST, "url_foto", FILTER_SANITIZE_SPECIAL_CHARS); // Foto actual
                $url_cv = filter_input(INPUT_POST, "url_cv", FILTER_SANITIZE_SPECIAL_CHARS); // CV actual
                
                // Archivos subidos
                $foto = $_FILES['foto'];
                $cv = $_FILES['cv'];
        
                // Ruta de destino de los archivos
                $rutaImagen = "assets/images/";
                $rutaPDF = "assets/pdf/";
        
                // Inicializar nombres de los archivos
                $fotoNombre = $url_foto; // Asignar la ruta actual de la foto si no se sube una nueva
                $cvNombre = $url_cv; // Asignar la ruta actual del CV si no se sube un nuevo CV
        
                // Verificar si se subió la foto
                if (isset($foto) && $foto['error'] == UPLOAD_ERR_OK) {
                    // Verificar si la imagen es la imagen de marcador de posición
                    if ($fotoNombre && $fotoNombre !== "assets/images/placeholder-image.jpg") {
                        // Eliminar la foto anterior si existe y no es la imagen placeholder
                        if (file_exists($fotoNombre)) {
                            unlink($fotoNombre); // Eliminar el archivo anterior
                            echo "Foto anterior eliminada. <br>";
                        }
                    } else {
                        echo "La imagen es la de marcador de posición, no se eliminará. <br>";
                    }
                
                    $fotoTmp = $foto['tmp_name'];
                    $fotoExtension = pathinfo($foto['name'], PATHINFO_EXTENSION);
                    $fotoNombre = uniqid('foto_', true) . '.' . $fotoExtension;
                    $fotoDestino = $rutaImagen . $fotoNombre;
                    
                    // Verificar que el archivo es una imagen
                    if (getimagesize($fotoTmp)) {
                        if (move_uploaded_file($fotoTmp, $fotoDestino)) {
                            echo "Imagen subida con éxito: $fotoNombre <br>";
                        } else {
                            echo "Error al subir la imagen. <br>";
                        }
                    } else {
                        echo "El archivo no es una imagen válida. <br>";
                    }
                    $fotoNombre = $fotoDestino;
                }
                
        
                // Verificar si se subió el CV
                if (isset($cv) && $cv['error'] == UPLOAD_ERR_OK) {
                    // Verificar si el CV es el de marcador predeterminado
                    if ($cvNombre && $cvNombre !== "assets/pdf/cv.pdf") {
                        // Eliminar el CV anterior si existe y no es el CV de marcador
                        if (file_exists($cvNombre)) {
                            unlink($cvNombre); // Eliminar el archivo anterior
                            echo "CV anterior eliminado. <br>";
                        }
                    } else {
                        echo "El archivo es el CV de marcador, no se eliminará. <br>";
                    }
                
                    $cvTmp = $cv['tmp_name'];
                    $cvExtension = pathinfo($cv['name'], PATHINFO_EXTENSION);
                    
                    // Asegurarse de que el archivo sea un PDF
                    if (strtolower($cvExtension) == 'pdf') {
                        $cvNombre = uniqid('cv_', true) . '.pdf'; // Generar un nombre único para el nuevo CV
                        $cvDestino = $rutaPDF . $cvNombre;
                
                        if (move_uploaded_file($cvTmp, $cvDestino)) {
                            echo "CV subido con éxito: $cvNombre <br>";
                        } else {
                            echo "Error al subir el archivo PDF. <br>";
                        }
                    } else {
                        echo "El archivo no es un PDF válido. <br>";
                    }
                    $cvNombre = $cvDestino;
                }
                
        
                // Aquí puedes insertar los datos en la base de datos
                // Por ejemplo, si tienes una función `insertarDatosPortafolio` en el modelo
                ModeloPortafolios::setData($nombre_completo, $descripcion, $fotoNombre, $cvNombre, Sesion::get("id"));
                
            } catch (PDOException $e) {
                error_log($e);
            }
        }
    }
    ?>
