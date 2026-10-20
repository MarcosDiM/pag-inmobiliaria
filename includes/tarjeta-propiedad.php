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
        <p class="tarjeta-propiedad__ubicacion">
            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
            <?php echo $ubicacionPropiedad; ?>
        </p>

        <ul class="tarjeta-propiedad__caracteristicas" aria-label="Características de la propiedad">
            <?php if (!empty($propiedad['habitaciones'])): ?>
                <li><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 20V8h16v12M4 12h16M7 8V5h10v3"></path></svg><?php echo (int) $propiedad['habitaciones']; ?> Hab</li>
            <?php endif; ?>
            <?php if (!empty($propiedad['banios'])): ?>
                <li><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 12h16v3a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4zM7 12V6a2 2 0 0 1 4 0"></path></svg><?php echo (int) $propiedad['banios']; ?> Baños</li>
            <?php endif; ?>
            <?php if (!empty($propiedad['metros_cuadrados'])): ?>
                <li><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M8 4H5a1 1 0 0 0-1 1v3M16 4h3a1 1 0 0 1 1 1v3M20 16v3a1 1 0 0 1-1 1h-3M8 20H5a1 1 0 0 1-1-1v-3"></path></svg><?php echo number_format((float) $propiedad['metros_cuadrados'], 0, ',', '.'); ?> m²</li>
            <?php endif; ?>
        </ul>
    </div>

    <div class="tarjeta-propiedad__pie">
        <div>
            <span class="tarjeta-propiedad__etiqueta">Precio</span>
            <p class="tarjeta-propiedad__precio">€<?php echo $precioPropiedad . $operacionPropiedad; ?></p>
        </div>
        <a class="tarjeta-propiedad__enlace" href="/pag-inmobiliaria/pages/propiedad-detalle.php?id=<?php echo (int) ($propiedad['id'] ?? 0); ?>">Ver detalle <span aria-hidden="true">↗</span></a>
    </div>
</article>