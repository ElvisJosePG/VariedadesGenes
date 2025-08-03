<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Variedades Genes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include('conexion.php');
    $categorias = mysqli_query($conexion, "SELECT * FROM categorias LIMIT 5");

    // Consulta para obtener productos con su imagen principal
    $consulta = "
    SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.marca, i.ruta_imagen
    FROM productos p
    LEFT JOIN (
        SELECT id_producto, MIN(ruta_imagen) AS ruta_imagen
        FROM imagenes_productos
        GROUP BY id_producto
    ) i ON p.id = i.id_producto
";
    $resultado = mysqli_query($conexion, $consulta); //Me esta mandando error en esta linea cuando inicio sesion 
    ?>


    <!-- HEADER -->
       <?php include('../componentes/header.php'); ?>



    <main class="flex-grow-1">

      

        <!-- PRODUCTOS -->
        <section class="products container my-5">
            <div class="row justify-content-center g-4">
                <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                    <div class="col-6 col-md-3">
                        <div class="card h-100 shadow producto-box">
                            <?php if ($producto['ruta_imagen']): ?>
                                <img src="<?php echo $producto['ruta_imagen']; ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>">
                            <?php else: ?>
                                <img src="placeholder.jpg" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Sin imagen">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="card-text"><strong>Precio:</strong> $<?php echo number_format($producto['precio'], 2); ?></p>
                                <p class="card-text"><strong>Stock:</strong> <?php echo $producto['stock']; ?></p>
                                <p class="card-text"><strong>Marca:</strong> <?php echo htmlspecialchars($producto['marca']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    
       <?php include('../componentes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>