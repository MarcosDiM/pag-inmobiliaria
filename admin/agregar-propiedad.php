<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear propiedad | Nido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="pagina-admin-agregar-propiedad">
    <?php include 'menu-admin.php'; ?>
    <main class="admin-agregar-propiedad">
        <section class="admin-agregar-propiedad__tarjeta" aria-labelledby="titulo-propiedad">
            <header class="admin-agregar-propiedad__encabezado">
                <div>
                    <h1 class="admin-agregar-propiedad__titulo" id="titulo-propiedad">Crear propiedad</h1>
                    <p class="admin-agregar-propiedad__introduccion">Completa la información para publicar una nueva propiedad en el catálogo.</p>
                </div>
                <div class="admin-agregar-propiedad__acciones">
                    <a class="admin-agregar-propiedad__cancelar" href="propiedades.php">Cancelar</a>
                    <button class="admin-agregar-propiedad__crear" type="submit" form="formulario-propiedad">
                        <span aria-hidden="true">＋</span>
                        Crear propiedad
                    </button>
                </div>
            </header>

            <form class="admin-agregar-propiedad__formulario" id="formulario-propiedad" method="post" enctype="multipart/form-data">
                <div class="admin-agregar-propiedad__campos">
                    <label class="admin-agregar-propiedad__campo">
                        <span>Título de la propiedad</span>
                        <input type="text" name="nombre" placeholder="Ej. Villa de lujo en primera línea" required>
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Ubicación</span>
                        <input type="text" name="ubicacion" placeholder="Ej. San José, Ibiza" required>
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Precio</span>
                        <input type="number" name="precio" min="0" step="0.01" placeholder="Ej. 2.400.000" required>
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Tipo de propiedad</span>
                        <select name="tipo_propiedad" required>
                            <option value="" selected disabled>Selecciona un tipo</option>
                            <option value="casa">Casa</option>
                            <option value="departamento">Departamento</option>
                            <option value="terreno">Terreno</option>
                        </select>
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Estado</span>
                        <select name="estado" required>
                            <option value="" selected disabled>Selecciona un estado</option>
                            <option value="activo">Activa</option>
                            <option value="inactivo">Inactiva</option>
                        </select>
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Número de dormitorios</span>
                        <input type="number" name="habitaciones" min="0" step="1" placeholder="Ej. 5">
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Número de baños</span>
                        <input type="number" name="banios" min="0" step="1" placeholder="Ej. 4">
                    </label>

                    <label class="admin-agregar-propiedad__campo">
                        <span>Metros cuadrados</span>
                        <input type="number" name="metros_cuadrados" min="0" step="0.01" placeholder="Ej. 450">
                    </label>
                </div>

                <label class="admin-agregar-propiedad__campo admin-agregar-propiedad__campo--descripcion">
                    <span>Descripción</span>
                    <textarea name="descripcion" rows="3" placeholder="Describe los detalles destacados de la propiedad, como vistas, acabados y equipamiento."></textarea>
                </label>

                <fieldset class="admin-agregar-propiedad__galeria">
                    <legend>Galería de la propiedad</legend>
                    <div class="admin-agregar-propiedad__zona-archivos">
                        <div class="admin-agregar-propiedad__zona-texto">
                            <h2>Agregar imágenes</h2>
                            <span class="admin-agregar-propiedad__etiqueta-portada">Portada</span>
                        </div>
                        <label class="admin-agregar-propiedad__selector-archivos">
                            <strong>Arrastra imágenes aquí</strong>
                            <span>JPG o PNG (máx. 10 MB cada archivo)</span>
                            <span class="admin-agregar-propiedad__boton-archivos">
                                <span aria-hidden="true">＋</span>
                                Seleccionar archivos
                            </span>
                            <input type="file" name="imagenes[]" accept=".jpg,.jpeg,.png,image/jpeg,image/png" multiple>
                        </label>
                    </div>
                </fieldset>
            </form>
        </section>
    </main>
</body>
</html>