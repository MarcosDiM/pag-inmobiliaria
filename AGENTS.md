# AGENTS.md

## Descripción del proyecto

Este es un proyecto universitario de una página web para una inmobiliaria llamada "Nido". El proyecto está en una etapa temprana de desarrollo y corre en un servidor local XAMPP.

## Tecnologías permitidas

Utiliza únicamente estas tecnologías para el desarrollo:

- **HTML** — estructura de las páginas
- **CSS** — estilos y diseño
- **PHP** — lógica del servidor e includes

**No se debe usar:** JavaScript, frameworks PHP (Laravel, Symfony, etc.), frameworks CSS (Bootstrap, Tailwind, etc.), gestores de paquetes (Composer, npm), bases de datos, ni cualquier otra tecnología adicional.

## Convención de nombres

- Todos los nombres de variables, funciones, clases, archivos y selectores CSS deben estar en **español**.
- Usa nombres **sencillos y descriptivos**, no elaborados. Ejemplos:
  - `$listaPropiedades` (no `$listadoDePropiedadesDelSistema`)
  - `mostrarPropiedades()` (no `obtenerYProcesarListadoPropiedades()`)
  - `.boton-contacto` (no `.contenedor-boton-estilo-contacto`)
- Los archivos `.php` deben nombrarse en español cuando tengan lógica (ej: `contacto.php`). Los archivos de vistas pueden usar nombres descriptivos en español.
- Los archivos HTML deben ir en la carpeta `pages/`.

## Reglas para cada tarea

- Antes de modificar el proyecto, revisa estas reglas y el código existente relacionado con la tarea.
- Usa únicamente HTML, CSS y PHP, siguiendo las tecnologías permitidas arriba.
- Escribe en español los nombres de variables, funciones, clases, archivos y selectores nuevos; usa nombres sencillos y descriptivos.
- Mantén las páginas simples y reutiliza `includes/header.php` e `includes/footer.php` cuando corresponda.
- Centraliza los estilos en `css/estilos.css`, agrega comentarios breves que identifiquen la página y conserva sus bloques responsive.
- Evita cambios ajenos a la tarea y valida la sintaxis o el formato con las herramientas disponibles.

## Estructura del proyecto

pag-inmobiliaria/
├── includes/
│   ├── header.php      — Cabecera con navegación
│   └── footer.php      — Pie de página
├── pages/
│   ├── contacto.php    — Página de contacto
│   └── politicas-privacidad.php — Política de privacidad
├── css/
│   └── estilos.css     — Hoja de estilos principal
├── index.php           — Página principal
└── AGENTS.md           — Este archivo
```

## Principios de desarrollo

- **Proyecto universitario:** El código debe ser simple, legible y funcional. No se requiere código complejo ni optimización avanzada.
- **Funcionalidades básicas:** El objetivo es que el sitio funcione correctamente con características simples.
- **Reutilización con includes:** Usa `include` de PHP para reutilizar el header y footer en las páginas que lo necesiten.
- **Estilos centralizados:** Todo el CSS va en `css/estilos.css`. No usar estilos inline ni `<style>` en los HTML salvo casos excepcionales justificados.
- **Secciones de CSS:** Organiza `css/estilos.css` por página o componente y agrega antes de cada bloque un comentario que identifique su archivo, por ejemplo `/* Página: pages/contacto.php */`. Para estilos reutilizados, indica que son compartidos y nombra el include o componente correspondiente y las páginas que lo usan. Mantén también identificados los bloques responsive.
- **Comentarios simples:** Agrega comentarios breves en español cuando ayude a entender el código, pero sin exceso.

## Ejemplo de estructura básica

```php
<!DOCTYPE html>
<html lang="es">
<body>
    <?php include '../includes/header.php'; ?>
    <main class="pagina">
        <!-- Contenido de la página -->
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
```
