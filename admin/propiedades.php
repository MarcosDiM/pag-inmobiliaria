<?php
// Carga la conexión con la base de datos.
require_once __DIR__ . '/../conexion.php';

// Si se envió el formulario de eliminación, borra la propiedad.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'eliminar') {
    $consultaEliminar = $conexion->prepare('DELETE FROM propiedades WHERE id = :id');
    $consultaEliminar->execute(['id' => $_POST['id']]);
    // Vuelve al listado para no enviar el formulario otra vez al actualizar.
    header('Location: propiedades.php');
    exit;
}

// Lee los filtros seleccionados en la página.
$busqueda = trim($_GET['busqueda'] ?? '');
$filtroTipo = $_GET['tipo'] ?? '';
$filtroEstado = $_GET['estado'] ?? '';

// Guarda las condiciones de búsqueda y sus valores.
$condiciones = [];
$parametros = [];

if ($busqueda !== '') {
    $condiciones[] = '(nombre LIKE :nombre OR ubicacion LIKE :ubicacion)';
    $parametros['nombre'] = '%' . $busqueda . '%';
    $parametros['ubicacion'] = '%' . $busqueda . '%';
}

if ($filtroTipo !== '') {
    $condiciones[] = 'tipo_propiedad = :tipo';
    $parametros['tipo'] = $filtroTipo;
}

if ($filtroEstado !== '') {
    $condiciones[] = 'estado = :estado';
    $parametros['estado'] = $filtroEstado;
}

// Crea la consulta según los filtros que se hayan elegido.
$consultaSql = 'SELECT id, nombre, ubicacion, tipo_propiedad, precio, estado, imagen FROM propiedades';
if ($condiciones) {
    $consultaSql .= ' WHERE ' . implode(' AND ', $condiciones);
}
$consultaSql .= ' ORDER BY id DESC';

// Ejecuta la consulta y guarda las propiedades encontradas.
$consultaPropiedades = $conexion->prepare($consultaSql);
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
<body class="pagina-admin-propiedades">
    <!-- Incluye la navegación del panel de administración. -->
    <?php include 'menu-admin.php'; ?>
    <main class="admin-propiedades">
        <header class="admin-propiedades__encabezado">
            <h1 class="admin-propiedades__titulo">Propiedades</h1>
            <a class="admin-propiedades__nueva" href="agregar-propiedad.php">＋ Nueva Propiedad</a>
        </header>

        <!-- El formulario envía los filtros por la URL. -->
        <form class="admin-propiedades__filtros" method="get" action="propiedades.php">
            <label class="admin-propiedades__busqueda">
                <span class="admin-propiedades__etiqueta">Buscar propiedades</span>
                <span class="admin-propiedades__icono-busqueda" aria-hidden="true">⌕</span>
                <input type="search" name="busqueda" placeholder="Buscar por nombre o ubicación" value="<?php echo htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8'); ?>">
            </label>
            <label class="admin-propiedades__filtro">
                <span class="admin-propiedades__etiqueta">Tipo</span>
                <select name="tipo">
                    <option value="">Tipo</option>
                    <option value="casa" <?php echo $filtroTipo === 'casa' ? 'selected' : ''; ?>>Casa</option>
                    <option value="departamento" <?php echo $filtroTipo === 'departamento' ? 'selected' : ''; ?>>Departamento</option>
                    <option value="terreno" <?php echo $filtroTipo === 'terreno' ? 'selected' : ''; ?>>Terreno</option>
                </select>
            </label>
            <label class="admin-propiedades__filtro">
                <span class="admin-propiedades__etiqueta">Estado</span>
                <select name="estado">
                    <option value="">Estado</option>
                    <option value="activo" <?php echo $filtroEstado === 'activo' ? 'selected' : ''; ?>>Activa</option>
                    <option value="inactivo" <?php echo $filtroEstado === 'inactivo' ? 'selected' : ''; ?>>Inactiva</option>
                </select>
            </label>
            <button class="admin-propiedades__aplicar" type="submit">Filtrar</button>
            <?php if ($busqueda !== '' || $filtroTipo !== '' || $filtroEstado !== ''): ?>
                <a class="admin-propiedades__limpiar" href="propiedades.php">Limpiar</a>
            <?php endif; ?>
        </form>

        <div class="admin-propiedades__tabla-contenedor">
            <table class="admin-propiedades__tabla">
                <thead>
                    <tr>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Muestra una fila por cada propiedad encontrada. -->
                    <?php foreach ($propiedades as $propiedad): ?>
                        <?php
                        // Prepara los datos de la propiedad para mostrarlos.
                        $imagen = trim((string) ($propiedad['imagen'] ?? ''));
                        $nombre = htmlspecialchars((string) $propiedad['nombre'], ENT_QUOTES, 'UTF-8');
                        $ubicacion = htmlspecialchars((string) $propiedad['ubicacion'], ENT_QUOTES, 'UTF-8');
                        $tipo = ucfirst((string) $propiedad['tipo_propiedad']);
                        $estado = (string) $propiedad['estado'];
                        ?>
                        <tr>
                            <td data-etiqueta="Imagen">
                                <?php if ($imagen !== ''): ?>
                                    <img class="admin-propiedades__imagen" src="/pag-inmobiliaria/<?php echo htmlspecialchars(ltrim($imagen, '/'), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo $nombre; ?>">
                                <?php else: ?>
                                    <span class="admin-propiedades__imagen admin-propiedades__imagen--vacia">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td class="admin-propiedades__nombre" data-etiqueta="Nombre"><?php echo $nombre; ?></td>
                            <td data-etiqueta="Ubicación"><?php echo $ubicacion; ?></td>
                            <td data-etiqueta="Tipo"><span class="admin-propiedades__tipo"><?php echo htmlspecialchars($tipo, ENT_QUOTES, 'UTF-8'); ?></span></td>
                            <td class="admin-propiedades__precio" data-etiqueta="Precio">€<?php echo number_format((float) $propiedad['precio'], 0, ',', '.'); ?></td>
                            <td data-etiqueta="Estado">
                                <span class="admin-propiedades__estado admin-propiedades__estado--<?php echo $estado === 'activo' ? 'activo' : 'inactivo'; ?>">
                                    <?php echo $estado === 'activo' ? 'Activa' : 'Inactiva'; ?>
                                </span>
                            </td>
                            <td data-etiqueta="Acciones">
                                <div class="admin-propiedades__acciones">
                                    <a href="agregar-propiedad.php?id=<?php echo (int) $propiedad['id']; ?>">Editar</a>
                                    <form class="admin-propiedades__formulario-eliminar" method="post" action="propiedades.php">
                                        <input type="hidden" name="accion" value="eliminar">
                                        <input type="hidden" name="id" value="<?php echo (int) $propiedad['id']; ?>">
                                        <input class="admin-propiedades__control-eliminacion" id="confirmar-eliminacion-<?php echo (int) $propiedad['id']; ?>" type="checkbox" aria-label="Confirmar eliminación de <?php echo $nombre; ?>">
                                        <label class="admin-propiedades__boton-eliminar" for="confirmar-eliminacion-<?php echo (int) $propiedad['id']; ?>">Eliminar</label>
                                        <div class="admin-propiedades__confirmacion">
                                            <section class="admin-propiedades__ventana" role="dialog" aria-modal="true" aria-labelledby="titulo-eliminacion-<?php echo (int) $propiedad['id']; ?>" aria-describedby="texto-eliminacion-<?php echo (int) $propiedad['id']; ?>">
                                                <h2 id="titulo-eliminacion-<?php echo (int) $propiedad['id']; ?>">¿Estás seguro de eliminar esta propiedad?</h2>
                                                <p id="texto-eliminacion-<?php echo (int) $propiedad['id']; ?>">Esta acción no se puede deshacer. La propiedad se eliminará del panel.</p>
                                                <div class="admin-propiedades__botones-confirmacion">
                                                    <label class="admin-propiedades__boton-confirmacion" for="confirmar-eliminacion-<?php echo (int) $propiedad['id']; ?>">No</label>
                                                    <button class="admin-propiedades__boton-confirmacion admin-propiedades__boton-confirmacion--eliminar" type="submit" name="confirmar_eliminacion" value="1">Sí</button>
                                                </div>
                                            </section>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- Muestra un mensaje cuando no hay resultados. -->
                    <?php if (!$propiedades): ?>
                        <tr>
                            <td class="admin-propiedades__vacio" colspan="7">No hay propiedades que coincidan con esos filtros.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <p class="admin-propiedades__cantidad"><?php echo count($propiedades); ?> propiedades encontradas</p>
    </main>
</body>
</html>
