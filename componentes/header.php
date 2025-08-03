<header class="navbar navbar-dark bg-dark px-4 d-flex justify-content-between align-items-center" style="height: 70px;">

    <div>
        <img src="../imagen/logo_circulo.png"
            alt="Icono menú"
            data-bs-toggle="dropdown"
            style="width: 60px; height: 60px; cursor: pointer; object-fit: cover;" />
        <span class="navbar-brand mb-0 h1">VARIEDADES GENES</span>
    </div>

    <div>
        <input type="text" class="form-control form-control-sm" placeholder="Buscar..." style="width: 500px;" />
    </div>

    <div class="d-flex align-items-center gap-4">
        <!-- Carrito -->
        <div>
            <img src="../imagen/carro.png"
                alt="Icono carrito"
                style="width: 40px; height: 40px; cursor: pointer; object-fit: cover;" />
        </div>

        <!-- Menú desplegable -->
        <div class="dropdown">
            <img src="../imagen/menu.png"
                alt="Icono menú"
                data-bs-toggle="dropdown"
                style="width: 40px; height: 40px; cursor: pointer; object-fit: cover;" />
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="./registro_producto.php">Agregar productos</a></li>
                <li><a class="dropdown-item" href="./registro_categoria.php">Agregar categoría</a></li>
                <li><a class="dropdown-item" href="./login.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>

</header>