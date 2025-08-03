<?php
$servidor = "localhost";       
$usuario = "root";             
$contraseña = "3123.";          
$bd = "variedadesgenes";              

// Establecer la conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $bd);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
