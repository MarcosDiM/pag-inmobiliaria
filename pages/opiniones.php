<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opiniones de clientes | Nido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="opiniones">
        <div class="opiniones__contenedor">
            <header class="opiniones__encabezado">
                <p class="opiniones__etiqueta">Testimonios</p>
                <h1 class="opiniones__titulo">Historias de clientes que encontraron su hogar ideal con Nido.</h1>
            </header>

            <section class="opiniones__lista" aria-label="Opiniones de nuestros clientes">
                <article class="opiniones__tarjeta">
                    <p class="opiniones__estrellas" aria-label="5 de 5 estrellas">☆☆☆☆☆</p>
                    <blockquote class="opiniones__texto">“La transparencia fue total desde el primer día. Nos guiaron en cada paso y cerramos la casa de nuestros sueños sin sorpresas.”</blockquote>
                    <div class="opiniones__autor">
                        <span class="opiniones__inicial" aria-hidden="true">M</span>
                        <div>
                            <h2 class="opiniones__nombre">Martina López</h2>
                            <p class="opiniones__propiedad">Casa en Godoy Cruz</p>
                        </div>
                    </div>
                </article>

                <article class="opiniones__tarjeta">
                    <p class="opiniones__estrellas" aria-label="4 de 5 estrellas">☆☆☆☆</p>
                    <blockquote class="opiniones__texto">“La gestión fue rápida y clara. Nos ayudaron a comparar opciones y finalmente encontramos el departamento perfecto para nuestra familia.”</blockquote>
                    <div class="opiniones__autor">
                        <span class="opiniones__inicial" aria-hidden="true">S</span>
                        <div>
                            <h2 class="opiniones__nombre">Santiago Ruiz</h2>
                            <p class="opiniones__propiedad">Departamento en Mendoza</p>
                        </div>
                    </div>
                </article>

                <article class="opiniones__tarjeta">
                    <p class="opiniones__estrellas" aria-label="5 de 5 estrellas">☆☆☆☆☆</p>
                    <blockquote class="opiniones__texto">“La comunicación fue constante y el cierre fue muy ágil. Recomiendo a Nido a cualquiera que busque una experiencia tranquila.”</blockquote>
                    <div class="opiniones__autor">
                        <span class="opiniones__inicial" aria-hidden="true">L</span>
                        <div>
                            <h2 class="opiniones__nombre">Lucía Torres</h2>
                            <p class="opiniones__propiedad">Terreno en Maipú</p>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
