<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Variedades Genes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="../css/estilos_categoria.css">

</head>

<body
 class="d-flex flex-column min-vh-100">
    <?php
    include('conexion.php');
    $categorias = mysqli_query($conexion, "SELECT * FROM categorias LIMIT 5");

    // ================================
    // CONSULTA CON BÚSQUEDA
    // ================================
    $buscar = "";
    $categoria = "";

    if (isset($_GET['categoria']) && !empty(trim($_GET['categoria']))) {
        $categoria = mysqli_real_escape_string($conexion, $_GET['categoria']);
        $consulta = "
        SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.marca, 
               i.ruta_imagen, c.nombre AS categoria
        FROM productos p
        LEFT JOIN (
            SELECT id_producto, MIN(ruta_imagen) AS ruta_imagen
            FROM imagenes_productos
            GROUP BY id_producto
        ) i ON p.id = i.id_producto
        INNER JOIN categorias c ON p.id_categoria = c.id
        WHERE c.nombre = '$categoria'
    ";
    } elseif (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
        $buscar = mysqli_real_escape_string($conexion, $_GET['buscar']);
        $consulta = "
        SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.marca, i.ruta_imagen
        FROM productos p
        LEFT JOIN (
            SELECT id_producto, MIN(ruta_imagen) AS ruta_imagen
            FROM imagenes_productos
            GROUP BY id_producto
        ) i ON p.id = i.id_producto
        WHERE p.nombre LIKE '%$buscar%'
           OR p.descripcion LIKE '%$buscar%'
           OR p.marca LIKE '%$buscar%'
    ";
    } else {
        $consulta = "
        SELECT p.id, p.nombre, p.descripcion, p.precio, p.stock, p.marca, i.ruta_imagen
        FROM productos p
        LEFT JOIN (
            SELECT id_producto, MIN(ruta_imagen) AS ruta_imagen
            FROM imagenes_productos
            GROUP BY id_producto
        ) i ON p.id = i.id_producto
    ";
    }


    $resultado = mysqli_query($conexion, $consulta);

    // Verificar error en consulta
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
    ?>

    <!-- HEADER -->
    <?php include('../componentes/header.php'); ?>
    

 
    <!-- MENU CATEGORÍAS -->
    <?php include('../componentes/menu_categoria.php'); ?>

    <main class="flex-grow-1">
        <!-- PRODUCTOS -->
        <section class="products container my-5">
            <div class="row justify-content-center g-4">
                <?php if (mysqli_num_rows($resultado) === 0): ?>
                    <p class="text-center">No se encontraron productos que coincidan con la búsqueda.</p>
                <?php else: ?>
                    <?php while ($producto = mysqli_fetch_assoc($resultado)): ?>
                        <div class="col-6 col-md-3">
                            <div class="card h-100 shadow producto-box">
                                <?php if ($producto['ruta_imagen']): ?>
                                    <img src="<?php echo $producto['ruta_imagen']; ?>"
                                        class="card-img-top"
                                        style="height: 200px; object-fit: cover;"
                                        alt="Imagen de <?php echo htmlspecialchars($producto['nombre']); ?>">
                                <?php else: ?>
                                    <img src="placeholder.jpg"
                                        class="card-img-top"
                                        style="height: 200px; object-fit: cover;"
                                        alt="Sin imagen">
                                <?php endif; ?>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                    <p class="card-text"><strong>Precio:</strong> $<?php echo number_format($producto['precio'], 2); ?></p>
                                    <p class="card-text"><strong>Stock:</strong> <?php echo $producto['stock']; ?></p>
                                    <p class="card-text"><strong>Marca:</strong> <?php echo htmlspecialchars($producto['marca']); ?></p>
                                    <p class="card-text"><strong>Categoria:</strong> <?php echo htmlspecialchars($categoria); ?></p>
                              
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <?php include('../componentes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>