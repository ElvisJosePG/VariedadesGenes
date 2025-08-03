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
    $resultado = mysqli_query($conexion, $consulta);
    ?>


    <!-- HEADER -->
    <header class="navbar navbar-dark bg-dark px-4 d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h1 text-center mx-auto">VARIEDADES GENES</span>

        <div class="dropdown">
            <!-- Imagen como botón del menú -->
            <img src="../imagen/logo2.png"
                alt="Icono menú"
                class="rounded-circle"
                data-bs-toggle="dropdown"
                style="width: 60px; height: 60px; cursor: pointer; object-fit: cover;" />

            <!-- Menú desplegable -->
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="./registro_producto.php">Agregar productos</a></li>
                <li><a class="dropdown-item" href="./registro_categoria.php">Agregar categoría</a></li>
                <li><a class="dropdown-item" href="./login.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </header>


    <main class="flex-grow-1">

        <!-- SEARCH BAR -->
        <section class="search-bar container my-4">
            <input type="text" class="form-control" placeholder="Buscar productos o categorías..." />
        </section>

   
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
    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0">© 2025 Variedades Genes. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>