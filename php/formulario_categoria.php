<?php
include('conexion.php');

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Preparar la consulta SQL
    $agregar_registro = "INSERT INTO categorias (nombre, descripcion) VALUES ('$nombre','$descripcion')";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $agregar_registro)) { 
        echo "<script>
                alert('Producto guardado con éxito con imágenes.');
                window.location.href='home.php';
              </script>";
        
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $agregar_registro . "<br>" . mysqli_error($conexion) . "</div>";  // Usar mysqli_error() para obtener el mensaje de error
    }

    // Cerrar la conexión
    mysqli_close($conexion);  

}
