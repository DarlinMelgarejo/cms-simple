<?php
    include_once __DIR__ . "/../core/controllers/ControladorPortafolios.php";

    $portafolio = ControladorPortafolios::data();
?>
<div class="bg-minimal">
    <section class="l-container">
        <div class="flex flex-column flex-row-l items-center justify-between gap-4">
            <div class="">
                <h2 class="dark-color"><?php echo $portafolio["nombre_completo"]?></h2>
                <div class="flex gap-4">
                    <a class="btn btn-white" href="#trabajos-recientes">Ver trabajos</a>
                    <a class="btn btn-dark" href="#contacto">Contactar</a>
                </div>
            </div>
            <img src=<?php echo $portafolio["url_foto"]?> alt="Imagen placeholder de prueba" width="700px">
        </div>
    </section>
</div>