<?php
$servidor = "localhost";       
$usuario = "root";             
$password = "";          
$bd = "variedadesgenes";              

// Establecer la conexión
$conexion = new mysqli($servidor, $usuario, $password, $bd);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>