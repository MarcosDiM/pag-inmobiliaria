<?php
$imagenPropiedad = trim((string) ($propiedad['imagen'] ?? ''));
$nombrePropiedad = htmlspecialchars((string) ($propiedad['nombre'] ?? 'Propiedad'), ENT_QUOTES, 'UTF-8');
$ubicacionPropiedad = htmlspecialchars((string) ($propiedad['ubicacion'] ?? ''), ENT_QUOTES, 'UTF-8');
$precioPropiedad = number_format((float) ($propiedad['precio'] ?? 0), 0, ',', '.');
$operacionPropiedad = ($propiedad['tipo_operacion'] ?? '') === 'alquiler' ? ' / mes' : '';
?>
<article class="tarjeta-propiedad">
    <?php if ($imagenPropiedad !== ''): ?>
        <img class="tarjeta-propiedad__imagen" src="/pag-inmobiliaria/<?php echo htmlspecialchars(ltrim($imagenPropiedad, '/'), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $nombrePropiedad; ?>">
    <?php else: ?>
        <div class="tarjeta-propiedad__imagen tarjeta-propiedad__imagen--vacia">Sin imagen disponible</div>
    <?php endif; ?>

    <div class="tarjeta-propiedad__contenido">
        <h2 class="tarjeta-propiedad__nombre"><?php echo $nombrePropiedad; ?></h2>
        <p class="tarjeta-propiedad__ubicacion"><?php echo $ubicacionPropiedad; ?></p>

        <ul class="tarjeta-propiedad__caracteristicas" aria-label="Características">
            <?php if (!empty($propiedad['habitaciones'])): ?>
                <li><?php echo (int) $propiedad['habitaciones']; ?> hab.</li>
            <?php endif; ?>
            <?php if (!empty($propiedad['banios'])): ?>
                <li><?php echo (int) $propiedad['banios']; ?> baños</li>
            <?php endif; ?>
            <?php if (!empty($propiedad['metros_cuadrados'])): ?>
                <li><?php echo number_format((float) $propiedad['metros_cuadrados'], 0, ',', '.'); ?> m²</li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="tarjeta-propiedad__pie">
        <div>
            <span class="tarjeta-propiedad__etiqueta">Precio</span>
            <p class="tarjeta-propiedad__precio">€<?php echo $precioPropiedad . $operacionPropiedad; ?></p>
        </div>
        <a class="tarjeta-propiedad__enlace" href="/pag-inmobiliaria/pages/propiedad-detalle.php?id=<?php echo (int) ($propiedad['id'] ?? 0); ?>">Consultar <span aria-hidden="true">↗</span></a>
    </div>
</article>