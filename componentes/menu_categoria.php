<?php
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : '';
function activo($cat, $sel){ return ($cat === $sel) ? 'active text-primary' : ''; }
?>

<section class="categorias-menu py-3 border-top border-bottom bg-white">
  <div class="container d-flex justify-content-center flex-wrap gap-4">

    <a href="../php/home.php" class="categoria text-center text-decoration-none text-dark <?php echo ($categoriaSeleccionada===''?'active text-primary':''); ?>">
      <img src="../imagen/logo_circulo.png" alt="Todos" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Todos</p>
    </a>

    <a href="../php/home.php?categoria=Ropa" class="categoria text-center text-decoration-none text-dark <?php echo activo('Ropa',$categoriaSeleccionada); ?>">
      <img src="../imagen/Ropa.jpg" alt="Ropa" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Ropa</p>
    </a>

    <a href="../php/home.php?categoria=Cosméticos" class="categoria text-center text-decoration-none text-dark <?php echo activo('Cosméticos',$categoriaSeleccionada); ?>">
      <img src="../imagen/cosmetico.jpeg" alt="Cosméticos" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Cosméticos</p>
    </a>

    <a href="../php/home.php?categoria=Electrodomésticos" class="categoria text-center text-decoration-none text-dark <?php echo activo('Electrodomésticos',$categoriaSeleccionada); ?>">
      <img src="../imagen/Electrodomesticos.jpg" alt="Electrodomésticos" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Electrodomésticos</p>
    </a>

    <a href="../php/home.php?categoria=Útiles de aseo" class="categoria text-center text-decoration-none text-dark <?php echo activo('Útiles de aseo',$categoriaSeleccionada); ?>">
      <img src="../imagen/aseo.jpg" alt="Útiles de aseo" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Útiles de aseo</p>
    </a>

    <a href="../php/home.php?categoria=Útiles escolares" class="categoria text-center text-decoration-none text-dark <?php echo activo('Útiles escolares',$categoriaSeleccionada); ?>">
      <img src="../imagen/utilesEscolares.jpg" alt="Útiles escolares" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Útiles escolares</p>
    </a>

    <a href="../php/home.php?categoria=Lozas" class="categoria text-center text-decoration-none text-dark <?php echo activo('Lozas',$categoriaSeleccionada); ?>">
      <img src="../imagen/lozas.jpg" alt="Lozas" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Lozas</p>  
    </a>

    <a href="../php/home.php?categoria=Zapatos" class="categoria text-center text-decoration-none text-dark <?php echo activo('Zapatos',$categoriaSeleccionada); ?>">
      <img src="../imagen/zapatos.jpeg" alt="Zapatos" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Zapatos</p>
    </a>

    <a href="../php/home.php?categoria=Medicamentos" class="categoria text-center text-decoration-none text-dark <?php echo activo('Medicamentos',$categoriaSeleccionada); ?>">
      <img src="../imagen/medicamentos.jpg" alt="Medicamentos" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Medicamentos</p>
    </a>

    <a href="../php/home.php?categoria=Lociones" class="categoria text-center text-decoration-none text-dark <?php echo activo('Lociones',$categoriaSeleccionada); ?>">
      <img src="../imagen/locion.jpg" alt="Lociones" class="rounded-circle categoria-img" width="60" height="60">
      <p class="mt-2 mb-0 small">Lociones</p>
    </a>

  </div>
</section>