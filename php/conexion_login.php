<?php
include("conexion.php");

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$consulta = mysqli_query($conexion, "SELECT * FROM login WHERE usuario = '$usuario' AND password = '$password'");
$numero_de_filas = mysqli_num_rows($consulta);

if ($numero_de_filas == 1) {
    header("Location: home.php");
    exit();
} else {
    echo "<script>
        alert('FATAL ERROR: Los datos ingresados son incorrectos :(');
        location.assign('../index.php');
    </script>";
}
?>