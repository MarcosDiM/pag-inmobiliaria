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

## Estructura del proyecto

```
pag-inmobiliaria/
├── includes/
│   ├── header.php      — Cabecera con navegación
│   └── footer.php      — Pie de página
├── pages/
│   └── contacto.html   — Página de contacto (y otras páginas HTML)
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
- **Comentarios simples:** Agrega comentarios breves en español cuando ayude a entender el código, pero sin exceso.

## Ejemplo de estructura básica

```php
<?php include 'includes/header.php'; ?>

<!-- Contenido de la página -->

<?php include 'includes/footer.php'; ?>
```
