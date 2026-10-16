<?php
require_once 'conexion.php';
$propiedades = $conexion->query("SELECT * FROM propiedades WHERE estado = 'activo' ORDER BY id DESC LIMIT 4")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nido | Encuentra tu vivienda</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main class="inicio">
        <section class="inicio__hero" aria-label="Encuentra tu vivienda">
            <h1 class="inicio__titulo">Encuentra tu vivienda</h1>
        </section>

        <section class="inicio__seccion inicio__propiedades" aria-labelledby="titulo-propiedades">
            <div class="inicio__encabezado">
                <h2 class="inicio__subtitulo" id="titulo-propiedades">Nuestras propiedades</h2>
                <a class="inicio__ver-todo" href="pages/propiedades.php">Ver todo el catálogo <span aria-hidden="true">→</span></a>
            </div>
            <?php if (count($propiedades) > 0): ?>
                <div class="inicio__lista-propiedades">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <?php include 'includes/tarjeta-propiedad.php'; ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="propiedades__vacio">No hay propiedades disponibles por el momento.</p>
            <?php endif; ?>
        </section>

        <section class="inicio__seccion inicio__confianza" aria-labelledby="titulo-confianza">
            <h2 class="inicio__subtitulo" id="titulo-confianza">Razones para confiar en Nosotros</h2>
            <div class="inicio__lista-razones">
                <article class="inicio__razon">
                    <span class="inicio__icono" aria-hidden="true">♧</span>
                    <h3>Asesoría Personalizada</h3>
                    <p>Un equipo dedicado que entiende tu estilo de vida y prioriza propiedades que se ajustan a tu visión.</p>
                </article>
                <article class="inicio__razon">
                    <span class="inicio__icono" aria-hidden="true">◇</span>
                    <h3>Propiedades Verificadas</h3>
                    <p>Validamos documentación, estado y potencial de cada inmueble para que la búsqueda sea segura y clara.</p>
                </article>
                <article class="inicio__razon">
                    <span class="inicio__icono" aria-hidden="true">▱</span>
                    <h3>Financiación Flexible</h3>
                    <p>Conectamos a compradores con opciones de financiación adaptadas a cada perfil y necesidad.</p>
                </article>
                <article class="inicio__razon">
                    <span class="inicio__icono" aria-hidden="true">◷</span>
                    <h3>Soporte 24/7</h3>
                    <p>Respuesta inmediata durante todo el proceso, desde la primera visita hasta la firma final.</p>
                </article>
            </div>
        </section>

        <section class="inicio__seccion inicio__nosotros" id="nosotros" aria-labelledby="titulo-nosotros">
            <img class="inicio__imagen-nosotros" src="img/about-image.png" alt="Salón luminoso integrado con cocina y comedor">
            <div class="inicio__texto-nosotros">
                <h2 class="inicio__subtitulo" id="titulo-nosotros">Donde la comodidad y el hogar se encuentran</h2>
                <p>Nido es una agencia que encuentra espacios pensados para vivir bien. Creemos que un hogar debe ser simple, cálido y cómodo. Nuestro equipo busca propiedades donde lo esencial sea sentirse en casa.</p>
                <dl class="inicio__estadisticas">
                    <div><dt>+500</dt><dd>Propiedades</dd></div>
                    <div><dt>+12</dt><dd>Años</dd></div>
                    <div><dt>+98%</dt><dd>Satisfacción</dd></div>
                </dl>
            </div>
        </section>

        <section class="inicio__contacto" aria-labelledby="titulo-contacto">
            <div>
                <h2 id="titulo-contacto">¿Listo para encontrar tu próximo hogar?</h2>
                <p>Nuestro equipo está listo para ayudarte a encontrar el espacio perfecto. Comparte tus preferencias y te contactaremos con propuestas personalizadas.</p>
            </div>
            <a href="pages/contacto.php">Contactar con un asesor</a>
        </section>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>


