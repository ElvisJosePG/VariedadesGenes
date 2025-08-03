<?php
// CONEXIÓN A LA BASE DE DATOS Y CONSULTA DE CATEGORÍAS
include('conexion.php'); // Asegúrate de que la ruta esté correcta
$categorias = mysqli_query($conexion, "SELECT id, nombre FROM categorias");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


</header>

<body class="bg-light">
    <!-- HEADER -->
    <?php include('../componentes/header.php'); ?>


    <main class="flex-grow-1">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow-lg p-4 rounded-4" style="width: 100%; max-width: 500px;">
                <h2 class="text-center mb-4">REGISTRAR PRODUCTOS</h2>

                <form action="formulario_producto.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" required>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" required>
                    </div>

                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" required>
                    </div>

                    <!-- SELECT DE CATEGORÍA -->
                    <div class="mb-3">
                        <label for="id_categoria" class="form-label">Categoría</label>
                        <select class="form-select" id="id_categoria" name="id_categoria" required>
                            <option value="">Seleccione una categoría</option>
                            <?php while ($cat = mysqli_fetch_assoc($categorias)) : ?>
                                <option value="<?php echo $cat['id']; ?>">
                                    <?php echo htmlspecialchars($cat['nombre']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imagenes" class="form-label">Imágenes del producto</label>
                        <input type="file" class="form-control" name="imagenes[]" id="imagenes" multiple accept="image/*" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" onclick="location.href='./home.php'" class="btn">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <?php include('../componentes/footer.php'); ?>


    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>