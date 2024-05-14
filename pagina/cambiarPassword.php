<?php
include './pagina/breadcrumb.php';
echo $breadcrumbs;

include_once './php/ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email_usuario = $_SESSION['email'];

require_once './php/config.php';
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$conn = $conexionDB->obtenerConexion();

$sql = "SELECT * FROM usuarios WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {
    
    $fila = $resultado->fetch_assoc();
} else {
    echo "No se encontró el usuario en la base de datos.";
}

$conn->close();
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <?php
                
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success text-center fw-bold " role="alert">' . $_SESSION['success_message'] . '</div>';
                    unset($_SESSION['success_message']); 
                }

                if (isset($_SESSION['error_message'])) {
                    echo '<div class="alert alert-danger text-center fw-bold" role="alert">' . $_SESSION['error_message'] . '</div>';
                    unset($_SESSION['error_message']); 
                }
                ?>
                <div class="card-body">
                    <form action="./php/actualizar_password.php" method="POST">
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