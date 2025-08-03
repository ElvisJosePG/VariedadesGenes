<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];

    $carpeta = "imagenes_productos/$producto_id/";

    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    foreach ($_FILES['imagenes']['tmp_name'] as $i => $tmp) {
        if ($_FILES['imagenes']['error'][$i] === UPLOAD_ERR_OK) {
            $nombre = basename($_FILES['imagenes']['name'][$i]);
            $destino = $carpeta . uniqid() . "-" . $nombre;

            move_uploaded_file($tmp, $destino);
        }
    }

    echo "Imágenes subidas correctamente.";
    // Puedes redirigir de nuevo o mostrar mensaje
    // header("Location: productos.php");
}
?>
