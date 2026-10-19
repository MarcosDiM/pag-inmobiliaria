<?php
require_once '../conexion.php';

$filtroOperacion = $_GET['operacion'] ?? '';
$filtroTipo = $_GET['tipo'] ?? '';
$filtroLugar = $_GET['lugar'] ?? '';
$filtroPrecio = $_GET['precio'] ?? '';

$operacionesPermitidas = ['venta', 'alquiler'];
$tiposPermitidos = ['casa', 'departamento', 'terreno'];
$preciosPermitidos = ['hasta-100000', '100000-250000', '250000-500000', 'mas-500000'];

if (!in_array($filtroOperacion, $operacionesPermitidas, true)) {
    $filtroOperacion = '';
}

if (!in_array($filtroTipo, $tiposPermitidos, true)) {
    $filtroTipo = '';
}

if (!in_array($filtroPrecio, $preciosPermitidos, true)) {
    $filtroPrecio = '';
}

$lugares = $conexion->query("SELECT DISTINCT ubicacion FROM propiedades WHERE estado = 'activo' ORDER BY ubicacion")->fetchAll(PDO::FETCH_COLUMN);

if (!in_array($filtroLugar, $lugares, true)) {
    $filtroLugar = '';
}

$condiciones = ["estado = 'activo'"];
$parametros = [];

if ($filtroOperacion !== '') {
    $condiciones[] = 'tipo_operacion = :operacion';
    $parametros['operacion'] = $filtroOperacion;
}

if ($filtroTipo !== '') {
    $condiciones[] = 'tipo_propiedad = :tipo';
    $parametros['tipo'] = $filtroTipo;
}

if ($filtroLugar !== '') {
    $condiciones[] = 'ubicacion = :lugar';
    $parametros['lugar'] = $filtroLugar;
}

if ($filtroPrecio === 'hasta-100000') {
    $condiciones[] = 'precio <= :precio_maximo';
    $parametros['precio_maximo'] = 100000;
} elseif ($filtroPrecio === '100000-250000') {
    $condiciones[] = 'precio > :precio_minimo AND precio <= :precio_maximo';
    $parametros['precio_minimo'] = 100000;
    $parametros['precio_maximo'] = 250000;
} elseif ($filtroPrecio === '250000-500000') {
    $condiciones[] = 'precio > :precio_minimo AND precio <= :precio_maximo';
    $parametros['precio_minimo'] = 250000;
    $parametros['precio_maximo'] = 500000;
} elseif ($filtroPrecio === 'mas-500000') {
    $condiciones[] = 'precio > :precio_minimo';
    $parametros['precio_minimo'] = 500000;
}

$consultaPropiedades = $conexion->prepare(
    'SELECT * FROM propiedades WHERE ' . implode(' AND ', $condiciones) . ' ORDER BY id DESC'
);
$consultaPropiedades->execute($parametros);
$propiedades = $consultaPropiedades->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiedades | Nido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="catalogo-propiedades">
        <section class="propiedades__barra" aria-labelledby="titulo-filtros">
            <div class="propiedades__barra-interior">
                <h1 class="propiedades__titulo-filtros" id="titulo-filtros">Filtros</h1>
                <form class="propiedades__formulario-filtros" method="get" action="propiedades.php">
                    <label class="propiedades__campo-filtro">
                        <span>Operación</span>
                        <select name="operacion">
                            <option value="">Todas</option>
                            <option value="venta" <?php echo $filtroOperacion === 'venta' ? 'selected' : ''; ?>>Venta</option>
                            <option value="alquiler" <?php echo $filtroOperacion === 'alquiler' ? 'selected' : ''; ?>>Alquiler</option>
                        </select>
                    </label>
                    <label class="propiedades__campo-filtro">
                        <span>Tipo</span>
                        <select name="tipo">
                            <option value="">Todos</option>
                            <option value="casa" <?php echo $filtroTipo === 'casa' ? 'selected' : ''; ?>>Casa</option>
                            <option value="departamento" <?php echo $filtroTipo === 'departamento' ? 'selected' : ''; ?>>Departamento</option>
                            <option value="terreno" <?php echo $filtroTipo === 'terreno' ? 'selected' : ''; ?>>Terreno</option>
                        </select>
                    </label>
                    <label class="propiedades__campo-filtro">
                        <span>Lugar</span>
                        <select name="lugar">
                            <option value="">Todos</option>
                            <?php foreach ($lugares as $lugar): ?>
                                <option value="<?php echo htmlspecialchars($lugar, ENT_QUOTES, 'UTF-8'); ?>" <?php echo $filtroLugar === $lugar ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($lugar, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="propiedades__campo-filtro">
                        <span>Precio</span>
                        <select name="precio">
                            <option value="">Cualquier precio</option>
                            <option value="hasta-100000" <?php echo $filtroPrecio === 'hasta-100000' ? 'selected' : ''; ?>>Hasta €100.000</option>
                            <option value="100000-250000" <?php echo $filtroPrecio === '100000-250000' ? 'selected' : ''; ?>>€100.000 - €250.000</option>
                            <option value="250000-500000" <?php echo $filtroPrecio === '250000-500000' ? 'selected' : ''; ?>>€250.000 - €500.000</option>
                            <option value="mas-500000" <?php echo $filtroPrecio === 'mas-500000' ? 'selected' : ''; ?>>Más de €500.000</option>
                        </select>
                    </label>
                    <div class="propiedades__acciones-filtros">
                        <button class="propiedades__boton-filtro" type="submit">Aplicar</button>
                        <a class="propiedades__limpiar-filtros" href="propiedades.php">Limpiar</a>
                    </div>
                </form>
            </div>
        </section>

        <section class="propiedades">
            <h2 class="propiedades__titulo">Nuestras propiedades</h2>
            <?php if (count($propiedades) > 0): ?>
                <div class="propiedades__lista">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <?php include '../includes/tarjeta-propiedad.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="propiedades__vacio">No encontramos propiedades con esos filtros. Prueba con otras opciones.</p>
            <?php endif; ?>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>

