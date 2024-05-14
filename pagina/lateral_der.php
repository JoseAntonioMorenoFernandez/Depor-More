<!-- Menú lateral derecho -->

<?php

if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente') {
    // Redirigir al menú loginCliente.php 
    header('Location: ../pagina/loginCliente.php');
    exit();
}



if (isset($_SESSION['error_message'])) : ?>
    <div class="alert alert-danger text-center fw-bold m-4" role="alert">
        <div class="error-message"><?php echo $_SESSION['error_message']; ?></div>
    </div>
    <?php unset($_SESSION['error_message']);
    ?>
<?php endif; ?>

<!-- Formulario de Iniciar Sesión -->
<form action="./php/login_usuario.php" method="POST">

    <h2 class="fs-4 fw-semibold mt-2">Cuenta</h2>
    <div class="form-group m-2">
        <label for="email">Usuario</label>
        <input type="text" name="email" id="email" class="form-control mt-2" placeholder="Ingrese su usuario" required>
    </div>
    <div class="form-group m-2">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" class="form-control mt-2" placeholder="Ingrese su contraseña" required>
    </div>

    <div class="text-center mt-4 mb-4">
        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    </div>

    <a class="small text-decoration-none" href="index.php?page=recuperarPassword">¿Has olvidado tu contraseña?</a>

</form>

<!-- Formulario de Registro -->
<div class="border-top my-3 "></div>

<form action="index.php" method="get">
    <input type="hidden" name="page" value="registro">
    <div class="text-center mt-4 mb-4">
        <button type="submit" class="btn btn-success">Registro</button>
    </div>
</form>


<!-- Carrito compras -->
<div class="border-top my-3 pb-3 pt-5">
    <div class="col-12 d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-transparent p-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
            </svg>
            <span class="visually-hidden">Carrito de la Compra</span>
        </button>
    </div>
</div>