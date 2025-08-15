<?php
$servidor = "sql302.infinityfree.com"; // Nombre del host MySQL (NO es "localhost")
$usuario = "if0_39717395";             // Usuario de MySQL (el que aparece en tu panel)
$password = "5VolMWc277k3DNr";     // Reemplaza con tu contraseña real
$bd = "if0_39717395_variedades_genes";  // Nombre exacto de tu base de datos

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $password, $bd);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión exitosa";
}
?>
