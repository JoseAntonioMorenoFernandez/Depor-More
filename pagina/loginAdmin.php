<?php

if (isset($_SESSION['nombre_usuario'])) {
    $nombre = $_SESSION['nombre_usuario']; 
}
?>

<div class="card">
    <div class="card-body p-4">
        <h3 class="card-title fw-bold fs-5">Bienvenido, <?php echo isset($nombre) ? $nombre : 'Usuario'; ?></h3>
        <ul class="list-group list-group-flush">
        <li class="list-group-item pt-4"><a href="index.php?page=miCuenta" class="text-decoration-none">Mi cuenta</a></li>
        <li class="list-group-item pt-4"><a href="index.php?page=miCuenta" class="text-decoration-none">Mi cuenta</a></li>
            <li class="list-group-item pt-4"><a href="index.php?page=misPedidos" class="text-decoration-none">Mis Pedidos</a></li>
            <li class="list-group-item pt-4"><a href="index.php?page=cambiarPassword" class="text-decoration-none">Cambiar Contraseña</a></li>
            <li class="list-group-item pt-4"><a href="index.php?page=listaDeseos" class="text-decoration-none">Lista de Deseos</a></li>
            <li class="list-group-item pt-4"><a href="index.php?page=bajaUsuario" class="text-decoration-none">Eliminar usuario</a></li>
            <li class="list-group-item pt-4"><a href="./php/cerrarSesion.php" class="text-decoration-none">Cerrar Sesión</a></li>
            <li class="list-group-item pt-4 bg-secondary text-center fw-bold text-light p-0"><p>MENÚ ADMINISTRADOR</p></li>
            <li class="list-group-item pt-4 bg-light"><a href="index.php?page=productos" class="text-decoration-none">Articulos</a></li>
            <li class="list-group-item pt-4 bg-light"><a href="index.php?page=pedidosClientes" class="text-decoration-none">Pedidos Clientes</a></li>
            <li class="list-group-item pt-4 bg-light"><a href="index.php?page=usuarios" class="text-decoration-none">Usuarios</a></li>
            
        </ul>
    </div>
</div>

<!-- Carrito compras -->
<div class="border-top my-3 pb-3 pt-5">
    <div class="col-12 d-flex justify-content-center align-items-center">
        <a href="index.php?page=carrito" class="btn btn-transparent p-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
            </svg>
            <span class="visually-hidden">Carrito de la Compra</span>
        </a>
    </div>
</div>
