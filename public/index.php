<?php
// Incluir las configuraciones y utilidades necesarias
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/Utils.php';

// Conexión a la base de datos
$conexion = new ConexionBD();
$conexion->conectar();
$db = $conexion->getConexion();

// Obtener datos de configuración del sitio
$configQuery = "SELECT nombre_sitio, meta_titulo, meta_descripcion FROM configuracion LIMIT 1";
$configResult = $db->query($configQuery)->fetch(PDO::FETCH_ASSOC);

// Obtener header
$headerQuery = "SELECT titulo, subtitulo, logo_url FROM header LIMIT 1";
$headerResult = $db->query($headerQuery)->fetch(PDO::FETCH_ASSOC);

// Obtener banner
$bannerQuery = "SELECT imagen_url, video_url, texto FROM banner WHERE visible = 1 LIMIT 1";
$bannerResult = $db->query($bannerQuery)->fetch(PDO::FETCH_ASSOC);

// Obtener secciones
$sectionsQuery = "SELECT id, titulo, subtitulo FROM secciones ORDER BY orden ASC";
$sectionsResult = $db->query($sectionsQuery);

// Incluir el header común
include __DIR__ . '/../templates/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= htmlspecialchars($configResult['meta_descripcion']) ?>">
    <title><?= htmlspecialchars($configResult['meta_titulo']) ?></title>
    <link rel="stylesheet" href=<?php echo __DIR__ . '/../assets/css/styles.css'?>>
</head>
<body>
    <!-- Header del sitio -->
    <header class="site-header">
        <?php if ($headerResult): ?>
            <img src="<?= htmlspecialchars($headerResult['logo_url']) ?>" alt="Logo del sitio">
            <h1><?= htmlspecialchars($headerResult['titulo']) ?></h1>
            <p><?= htmlspecialchars($headerResult['subtitulo']) ?></p>
        <?php else: ?>
            <h1>Bienvenido a <?= htmlspecialchars($configResult['nombre_sitio']) ?></h1>
        <?php endif; ?>
    </header>

    <!-- Banner -->
    <?php if ($bannerResult): ?>
        <section class="site-banner">
            <?php if ($bannerResult['imagen_url']): ?>
                <img src="<?= htmlspecialchars($bannerResult['imagen_url']) ?>" alt="Banner">
            <?php elseif ($bannerResult['video_url']): ?>
                <video autoplay loop muted>
                    <source src="<?= htmlspecialchars($bannerResult['video_url']) ?>" type="video/mp4">
                </video>
            <?php endif; ?>
            <p><?= htmlspecialchars($bannerResult['texto']) ?></p>
        </section>
    <?php endif; ?>

    <!-- Secciones -->
    <main class="site-content">
        <?php while ($section = $sectionsResult->fetch(PDO::FETCH_ASSOC)): ?>
            <section class="section">
                <h2><?= htmlspecialchars($section['titulo']) ?></h2>
                <p><?= htmlspecialchars($section['subtitulo']) ?></p>

                <?php
                // Obtener artículos de la sección actual
                $articlesQuery = "SELECT titulo, contenido, imagen_url, video_url FROM articulos WHERE id_seccion = ? ORDER BY orden ASC";
                $stmt = $db->prepare($articlesQuery);
                $stmt->bind_param('i', $section['id']);
                $stmt->execute();
                $articlesResult = $stmt->get_result();
                ?>

                <div class="articles">
                    <?php while ($article = $articlesResult->fetch(PDO::FETCH_ASSOC)): ?>
                        <article>
                            <h3><?= htmlspecialchars($article['titulo']) ?></h3>
                            <p><?= htmlspecialchars($article['contenido']) ?></p>
                            <?php if ($article['imagen_url']): ?>
                                <img src="<?= htmlspecialchars($article['imagen_url']) ?>" alt="Artículo">
                            <?php elseif ($article['video_url']): ?>
                                <video controls>
                                    <source src="<?= htmlspecialchars($article['video_url']) ?>" type="video/mp4">
                                </video>
                            <?php endif; ?>
                        </article>
                    <?php endwhile; ?>
                </div>
            </section>
        <?php endwhile; ?>
    </main>

    <!-- Footer -->
    <?php include __DIR__ . '/../templates/footer.php'; ?>
</body>
</html>
