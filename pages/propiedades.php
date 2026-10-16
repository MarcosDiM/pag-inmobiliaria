<?php
require_once '../conexion.php';
$propiedades = $conexion->query("SELECT * FROM propiedades WHERE estado = 'activo' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
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
    <main>
        <section class="propiedades">
            <h1 class="propiedades__titulo">Propiedades</h1>
            <?php if (count($propiedades) > 0): ?>
                <div class="propiedades__lista">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <?php include '../includes/tarjeta-propiedad.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="propiedades__vacio">No hay propiedades disponibles por el momento.</p>
            <?php endif; ?>
        </section>
    </main>
    <?php include '../includes/footer.php'; ?>

</body>
</html>
