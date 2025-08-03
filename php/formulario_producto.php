<?php
include('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $marca = $_POST['marca'];
    $id_categoria = $_POST['id_categoria'];

    // Verificar que la categoría exista
    $consulta_categoria = "SELECT id FROM categorias WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $consulta_categoria);
    mysqli_stmt_bind_param($stmt, "i", $id_categoria);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        echo "<script>
            alert('FATAL ERROR: Categoria no se encuentra registrada');
            location.assign('registro_producto.php')
            </script>";
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
        exit;
    }
    mysqli_stmt_close($stmt);

    // Insertar producto
    $query_producto = "INSERT INTO productos (nombre, descripcion, precio, stock, marca, id_categoria) 
                       VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $query_producto);
    mysqli_stmt_bind_param($stmt, "ssdssi", $nombre, $descripcion, $precio, $stock, $marca, $id_categoria);

    if (mysqli_stmt_execute($stmt)) {
        $id_producto = mysqli_insert_id($conexion); // Obtener el ID del producto recién insertado

        // Procesar imágenes
        $carpeta = "imagenes_productos/$id_producto";
        if (!is_dir($carpeta)) {
            mkdir($carpeta, 0777, true);
        }

        foreach ($_FILES['imagenes']['tmp_name'] as $i => $tmp) {
            if ($_FILES['imagenes']['error'][$i] === UPLOAD_ERR_OK) {
                $nombre_archivo = uniqid() . "-" . basename($_FILES['imagenes']['name'][$i]);
                $destino = "$carpeta/$nombre_archivo";

                if (move_uploaded_file($tmp, $destino)) {
                    // Guardar ruta en la base de datos
                    $ruta_relativa = $destino;
                    $sql_img = "INSERT INTO imagenes_productos (id_producto, ruta_imagen) VALUES (?, ?)";
                    $stmt_img = mysqli_prepare($conexion, $sql_img);
                    mysqli_stmt_bind_param($stmt_img, "is", $id_producto, $ruta_relativa);
                    mysqli_stmt_execute($stmt_img);
                    mysqli_stmt_close($stmt_img);
                }
            }
        }

        echo "<script>
                alert('Producto guardado con éxito con imágenes.');
                window.location.href='home.php';
              </script>";
    } else {
        echo "<div class='alert alert-danger'>Error al guardar el producto: " . mysqli_error($conexion) . "</div>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
}