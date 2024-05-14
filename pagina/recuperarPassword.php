<?php

include_once './pagina/breadcrumb.php';
echo $breadcrumbs;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$nombre_value = '';
$dni_value = '';
$email_value = '';


if (isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];
    $nombre_value = isset($form_data['nombre']) ? htmlspecialchars($form_data['nombre']) : '';
    $dni_value = isset($form_data['dni']) ? htmlspecialchars($form_data['dni']) : '';
    $email_value = isset($form_data['email']) ? htmlspecialchars($form_data['email']) : '';

    unset($_SESSION['form_data']);
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <?php
                
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success text-center fw-bold " role="alert">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']); 
                } elseif (isset($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger text-center fw-bold" role="alert">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']); 
                }
                ?>
                <div class="card-body">
                    <form action="./php/recuperar_password.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre_value; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?php echo $dni_value; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $email_value; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Nueva Contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmar Contraseña" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
                            <a href="index.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>