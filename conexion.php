<?php
$host = "localhost";
$usuario = "root";
$password = ""; 

try {
    // 1. Conectamos primero a MySQL sin seleccionar base de datos para asegurarnos de que exista
    $conexion = new PDO("mysql:host=$host;charset=utf8mb4", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Creamos la base de datos si no existe
    $conexion->exec("CREATE DATABASE IF NOT EXISTS inmobiliaria_database CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    
    // 3. Seleccionamos la base de datos recién creada
    $conexion->exec("USE inmobiliaria_database");

    // 4. Creamos la tabla de propiedades si no existe
    $sql = "CREATE TABLE IF NOT EXISTS propiedades (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(150) NOT NULL,
        tipo_operacion ENUM('alquiler', 'venta') NOT NULL,
        ubicacion VARCHAR(255) NOT NULL,
        tipo_propiedad ENUM('casa', 'departamento', 'terreno') NOT NULL,
        precio DECIMAL(12, 2) NOT NULL,
        estado ENUM('activo', 'inactivo') DEFAULT 'activo',
        habitaciones INT DEFAULT NULL,
        banios INT DEFAULT NULL,
        metros_cuadrados DECIMAL(10, 2) DEFAULT NULL,
        descripcion TEXT,
        imagen VARCHAR(255),
        propietario VARCHAR(150) NOT NULL
    )";

    $sqlUsuarios = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";
    
    $conexion->exec($sql);
    $conexion->exec($sqlUsuarios);

} catch (PDOException $e) {
    // Si hay un error crítico al conectar
    die("Error de conexión: " . $e->getMessage());
}
?>