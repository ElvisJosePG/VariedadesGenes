<!-- Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php
$productos = [
    ['id' => 1, 'nombre' => 'Camiseta', 'precio' => 20],
    ['id' => 2, 'nombre' => 'Pantalón', 'precio' => 35],
    ['id' => 3, 'nombre' => 'Zapatos', 'precio' => 50],
];

foreach ($productos as $producto):
?>
    <div class="card m-2 p-2">
        <h5><?= $producto['nombre']; ?> - $<?= $producto['precio']; ?></h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productoModal<?= $producto['id']; ?>">
            Ver detalles / Subir imágenes
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="productoModal<?= $producto['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $producto['id']; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel<?= $producto['id']; ?>">Producto: <?= $producto['nombre']; ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">

            <p><strong>Precio:</strong> $<?= $producto['precio']; ?></p>

            <!-- FORMULARIO PARA SUBIR IMÁGENES -->
            <form action="subir_imagenes.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="producto_id" value="<?= $producto['id']; ?>">

              <div class="mb-3">
                <label for="imagenes<?= $producto['id']; ?>" class="form-label">Subir imágenes del producto:</label>
                <input class="form-control" type="file" name="imagenes[]" id="imagenes<?= $producto['id']; ?>" multiple accept="image/*">
              </div>

              <button type="submit" class="btn btn-success">Subir imágenes</button>
            </form>

          </div>
        </div>
      </div>
    </div>
<?php endforeach; ?>
