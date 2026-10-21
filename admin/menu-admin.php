<?php
$paginaActual = basename($_SERVER['PHP_SELF']);
$esPropiedades = in_array($paginaActual, ['propiedades.php', 'agregar-propiedad.php'], true);
$esConfiguracion = $paginaActual === 'configuracion.php';
?>
<aside class="menu-admin" aria-label="Menú de administración">
	<a class="menu-admin__marca" href="../index.php" aria-label="Nido, inicio">
		<img class="menu-admin__logo" src="../img/logo-nido-admin.png" alt="Nido">
	</a>

	<nav class="menu-admin__navegacion" aria-label="Administración">
		<h2 class="menu-admin__titulo">Dashboard</h2>

		<a class="menu-admin__enlace<?php echo $esPropiedades ? ' menu-admin__enlace--activo' : ''; ?>" href="propiedades.php"<?php echo $esPropiedades ? ' aria-current="page"' : ''; ?>>
			<img class="menu-admin__icono" src="../img/home-menu.png" alt="">
			<span>Propiedades</span>
		</a>

		<a class="menu-admin__enlace<?php echo $esConfiguracion ? ' menu-admin__enlace--activo' : ''; ?>" href="configuracion.php"<?php echo $esConfiguracion ? ' aria-current="page"' : ''; ?>>
			<img class="menu-admin__icono" src="../img/config-menu.png" alt="">
			<span>Configuración</span>
		</a>
	</nav>

	<a class="menu-admin__salir" href="login.php">
		<span>Cerrar sesión</span>
	</a>
</aside>
