<?php
// Conecta con la base de datos para poder buscar al usuario.
require_once __DIR__ . "/../conexion.php";

// Guarda el mensaje que se mostrará si los datos no son válidos.
$mensaje = "";

// Solo revisa los datos cuando se envía el formulario.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// Lee los datos enviados y quita espacios al principio y al final.
	$nombre = trim($_POST["nombre"] ?? "");
	$contrasena = trim($_POST["contrasena"] ?? "");

	// Pide completar ambos campos antes de consultar la base de datos.
	if ($nombre === "" || $contrasena === "") {
		$mensaje = "Completa todos los campos.";
	} else {
		// Busca un usuario que coincida con el nombre y la contraseña.
		$consulta = $conexion->prepare(
			"SELECT id FROM usuarios WHERE nombre = ? AND password = ? LIMIT 1"
		);
		$consulta->execute([$nombre, $contrasena]);

		// Si encuentra el usuario, abre la página de propiedades.
		if ($consulta->fetch(PDO::FETCH_ASSOC)) {
			header("Location: propiedades.php");
			exit;
		}

		// Si no lo encuentra, informa que los datos son incorrectos.
		$mensaje = "Usuario o contraseña incorrectos.";
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar sesión | Nido</title>
	<link rel="stylesheet" href="../css/estilos.css">
</head>
<body class="pagina-login">
	<main class="login">
		<a class="login__marca" href="../index.php">
			<img class="login__logo" src="../img/logo-nido-header.png" alt="Nido">
		</a>
		<h1 class="login__titulo">Panel administrador</h1>

		<!-- Formulario que envía el usuario y la contraseña a esta misma página. -->
		<form class="login__formulario" method="post">
			<input class="login__campo" type="text" name="nombre" placeholder="Usuario" aria-label="Usuario" autocomplete="username" required>

			<input class="login__campo" type="password" name="contrasena" placeholder="Contraseña" aria-label="Contraseña" autocomplete="current-password" required>

			<!-- El aviso reserva espacio para que el botón no se mueva cuando aparece. -->
			<p class="login__mensaje" role="alert"><?php if ($mensaje !== ""): ?><span class="login__icono-error" aria-hidden="true">!</span><?php endif; ?><?php echo htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8"); ?></p>

			<button class="login__boton" type="submit">Iniciar Sesión</button>
		</form>

	</main>
</body>
</html>
