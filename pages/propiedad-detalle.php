<?php
// Obtiene el ID de la propiedad enviado en la dirección.
$idPropiedad = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$propiedad = null;

// Busca la propiedad activa que corresponde a ese ID.
if ($idPropiedad !== false && $idPropiedad !== null) {
    require_once '../conexion.php';
    $consultaPropiedad = $conexion->prepare("SELECT * FROM propiedades WHERE id = :id AND estado = 'activo'");
    $consultaPropiedad->execute(['id' => $idPropiedad]);
    $propiedad = $consultaPropiedad->fetch(PDO::FETCH_ASSOC);
}

// Indica que la página no encontró la propiedad.
if (!$propiedad) {
    http_response_code(404);
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloPropiedad; ?></title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <!-- Incluye la cabecera del sitio. -->
    <?php include '../includes/header.php'; ?>
    <main class="detalle-propiedad">
        <?php if ($propiedad): ?>
            <?php
            // Prepara los datos de la propiedad para mostrarlos.
            $nombrePropiedad = htmlspecialchars((string) $propiedad['nombre'], ENT_QUOTES, 'UTF-8');
            $ubicacionPropiedad = htmlspecialchars((string) $propiedad['ubicacion'], ENT_QUOTES, 'UTF-8');
            $tipoPropiedad = htmlspecialchars(ucfirst((string) $propiedad['tipo_propiedad']), ENT_QUOTES, 'UTF-8');
            $operacionPropiedad = ($propiedad['tipo_operacion'] ?? '') === 'alquiler' ? 'Alquiler' : 'Venta';
            $precioPropiedad = number_format((float) $propiedad['precio'], 0, ',', '.');
            $descripcionPropiedad = trim((string) ($propiedad['descripcion'] ?? ''));
            $imagenPropiedad = trim((string) ($propiedad['imagen'] ?? ''));
            ?>
            <div class="detalle-propiedad__contenedor">
                <section class="detalle-propiedad__presentacion" aria-labelledby="titulo-propiedad">
                    <div class="detalle-propiedad__informacion">
                        <p class="detalle-propiedad__ubicacion">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z"></path>
                                <circle cx="12" cy="10" r="2.5"></circle>
                            </svg>
                            <?php echo $ubicacionPropiedad; ?>
                        </p>
                        <h1 class="detalle-propiedad__titulo" id="titulo-propiedad"><?php echo $nombrePropiedad; ?></h1>
                        <p class="detalle-propiedad__descripcion">
                            <?php echo $descripcionPropiedad !== '' ? htmlspecialchars($descripcionPropiedad, ENT_QUOTES, 'UTF-8') : 'Consulta con nuestro equipo para conocer más detalles de esta propiedad.'; ?>
                        </p>
                        <div class="detalle-propiedad__precio">
                            <div>
                                <span class="detalle-propiedad__etiqueta">Precio</span>
                                <p class="detalle-propiedad__importe">$<?php echo $precioPropiedad; ?><?php echo $operacionPropiedad === 'Alquiler' ? ' / mes' : ''; ?></p>
                            </div>
                            <a class="detalle-propiedad__contacto" href="/pag-inmobiliaria/pages/contacto.php">Contactar</a>
                        </div>
                    </div>

                    <div class="detalle-propiedad__imagen-contenedor">
                        <?php if ($imagenPropiedad !== ''): ?>
                            <img class="detalle-propiedad__imagen" src="/pag-inmobiliaria/<?php echo htmlspecialchars(ltrim($imagenPropiedad, '/'), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $nombrePropiedad; ?>">
                        <?php else: ?>
                            <div class="detalle-propiedad__imagen detalle-propiedad__imagen--vacia">Sin imagen disponible</div>
                        <?php endif; ?>
                    </div>
                </section>

                <!-- Muestra los datos y características de la propiedad. -->
                <section class="detalle-propiedad__caracteristicas" aria-labelledby="titulo-caracteristicas">
                    <h2 class="detalle-propiedad__subtitulo" id="titulo-caracteristicas">Características</h2>
                    <ul class="detalle-propiedad__lista">
                        <li class="detalle-propiedad__caracteristica">
                            <span class="detalle-propiedad__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M4 11 12 4l8 7v9h-6v-6h-4v6H4z"></path></svg>
                            </span>
                            <span class="detalle-propiedad__nombre-caracteristica">Tipo</span>
                            <span class="detalle-propiedad__valor"><?php echo $tipoPropiedad; ?></span>
                        </li>
                        <li class="detalle-propiedad__caracteristica">
                            <span class="detalle-propiedad__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="m20 13-7 7-10-10V3h7z"></path><circle cx="7.5" cy="7.5" r="1"></circle></svg>
                            </span>
                            <span class="detalle-propiedad__nombre-caracteristica">Operación</span>
                            <span class="detalle-propiedad__valor"><?php echo $operacionPropiedad; ?></span>
                        </li>
                        <li class="detalle-propiedad__caracteristica">
                            <span class="detalle-propiedad__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M4 20V8h16v12M4 12h16M7 8V5h10v3M8 16h.01M12 16h.01M16 16h.01"></path></svg>
                            </span>
                            <span class="detalle-propiedad__nombre-caracteristica">Habitaciones</span>
                            <span class="detalle-propiedad__valor"><?php echo $propiedad['habitaciones'] !== null ? (int) $propiedad['habitaciones'] : 'No especificado'; ?></span>
                        </li>
                        <li class="detalle-propiedad__caracteristica">
                            <span class="detalle-propiedad__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M4 12h16v3a4 4 0 0 1-4 4H8a4 4 0 0 1-4-4zM7 12V6a2 2 0 0 1 4 0M8 19v2M16 19v2"></path></svg>
                            </span>
                            <span class="detalle-propiedad__nombre-caracteristica">Baños</span>
                            <span class="detalle-propiedad__valor"><?php echo $propiedad['banios'] !== null ? (int) $propiedad['banios'] : 'No especificado'; ?></span>
                        </li>
                        <li class="detalle-propiedad__caracteristica">
                            <span class="detalle-propiedad__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none"><path d="M8 4H5a1 1 0 0 0-1 1v3M16 4h3a1 1 0 0 1 1 1v3M20 16v3a1 1 0 0 1-1 1h-3M8 20H5a1 1 0 0 1-1-1v-3"></path></svg>
                            </span>
                            <span class="detalle-propiedad__nombre-caracteristica">Superficie</span>
                            <span class="detalle-propiedad__valor"><?php echo $propiedad['metros_cuadrados'] !== null ? number_format((float) $propiedad['metros_cuadrados'], 0, ',', '.') . ' m²' : 'No especificada'; ?></span>
                        </li>
                    </ul>
                </section>
            </div>
        <?php else: ?>
            <section class="detalle-propiedad__vacio">
                <h1 class="detalle-propiedad__subtitulo">Propiedad no encontrada</h1>
                <p>No encontramos esta propiedad o ya no está disponible.</p>
                <a class="detalle-propiedad__contacto" href="/pag-inmobiliaria/pages/propiedades.php">Ver propiedades</a>
            </section>
        <?php endif; ?>
    </main>
    <!-- Incluye el pie de página del sitio. -->
    <?php include '../includes/footer.php'; ?>
</body>
</html>
