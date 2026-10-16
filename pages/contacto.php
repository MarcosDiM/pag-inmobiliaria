<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Nido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="contacto">
        <div class="contacto__contenedor">
            <header class="contacto__encabezado">
                <h1 class="contacto__titulo">Contacto</h1>
                <p class="contacto__introduccion">Si necesitas ayuda para encontrar tu próximo hogar o quieres recibir propuestas personalizadas, escríbenos y te responderemos lo antes posible.</p>
            </header>

            <div class="contacto__tarjetas">
                <section class="contacto__tarjeta" aria-labelledby="contacto-informacion">
                    <h2 class="contacto__subtitulo" id="contacto-informacion">Información de contacto</h2>
                    <dl class="contacto__lista">
                        <div class="contacto__dato">
                            <span class="contacto__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <rect x="4" y="6" width="16" height="12" rx="2"></rect>
                                    <path d="m5 7 7 6 7-6"></path>
                                </svg>
                            </span>
                            <div>
                                <dt class="contacto__etiqueta">Correo electrónico</dt>
                                <dd><a class="contacto__valor" href="mailto:hola@nido.es">hola@nido.es</a></dd>
                            </div>
                        </div>
                        <div class="contacto__dato">
                            <span class="contacto__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M7 3h3l2 5-2.5 1.5a14 14 0 0 0 5 5L16 12l5 2v3c0 1.1-.9 2-2 2C10.7 19 5 13.3 5 5c0-1.1.9-2 2-2Z"></path>
                                </svg>
                            </span>
                            <div>
                                <dt class="contacto__etiqueta">Teléfono</dt>
                                <dd><a class="contacto__valor" href="tel:+542611234567">+54 261 123 45 67</a></dd>
                            </div>
                        </div>
                        <div class="contacto__dato">
                            <span class="contacto__icono" aria-hidden="true">
                                <svg viewBox="0 0 24 24" fill="none">
                                    <path d="M19 10c0 5-7 11-7 11S5 15 5 10a7 7 0 1 1 14 0Z"></path>
                                    <circle cx="12" cy="10" r="2.5"></circle>
                                </svg>
                            </span>
                            <div>
                                <dt class="contacto__etiqueta">Dirección</dt>
                                <dd class="contacto__valor">Calle Falsa 1234</dd>
                            </div>
                        </div>
                    </dl>
                </section>

                <section class="contacto__tarjeta" aria-labelledby="contacto-redes">
                    <h2 class="contacto__subtitulo" id="contacto-redes">Nuestras redes sociales</h2>
                    <ul class="contacto__redes">
                        <li class="contacto__red">
                            <a class="contacto__red-enlace" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                                <span class="contacto__red-icono"><img src="../img/instagram.png" alt=""></span>
                                <span><span class="contacto__etiqueta">Instagram</span><span class="contacto__valor">nido.propiedades</span></span>
                            </a>
                        </li>
                        <li class="contacto__red">
                            <a class="contacto__red-enlace" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                                <span class="contacto__red-icono"><img src="../img/facebook.png" alt=""></span>
                                <span><span class="contacto__etiqueta">Facebook</span><span class="contacto__valor">Nido Propiedades</span></span>
                            </a>
                        </li>
                        <li class="contacto__red">
                            <a class="contacto__red-enlace" href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer">
                                <span class="contacto__red-icono"><img src="../img/linkedin.png" alt=""></span>
                                <span><span class="contacto__etiqueta">LinkedIn</span><span class="contacto__valor">Nido Propiedades</span></span>
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
