<?php

include_once './pagina/breadcrumb.php';
echo $breadcrumbs;

include_once './php/ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar'])) {
   
    include_once './php/ConexionDB.php';

    $email_usuario = $_SESSION['email'];

    require_once './php/config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET activo='N' WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario);

    if ($stmt->execute()) {
      
        session_destroy();

        exit();
    } else {
   
        echo "Error al eliminar el usuario.";
    }

    $conn->close();
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
    $nombre = $fila["nombre"];
    $apellidos = $fila["apellidos"];
    $dni = $fila["dni"];
    $email = $fila["email"];
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
                    <form action="index.php?page=usuarioBorrado" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger fw-bold" name="eliminar">ELIMINAR CUENTA</button>
                            <a href="index.php" class="btn btn-secondary">CANCELAR</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>