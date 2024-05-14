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
    $nombre = $fila["nombre"];
    $apellidos = $fila["apellidos"];
    $dni = $fila["dni"];
    $email = $fila["email"];
    $direccion = $fila["direccion"];
    $localidad = $fila["localidad"];
    $cpostal = $fila["cpostal"];
    $provincia = $fila["provincia"];
    $telefono = $fila["telefono"];
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
                    <form action="./php/actualizar_usuario.php" method="POST">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección" required>
                        </div>
                        <div class="mb-3">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $localidad; ?>" placeholder="Localidad" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpostal" class="form-label">Código postal</label>
                            <input type="text" class="form-control" id="cpostal" name="cpostal" value="<?php echo $cpostal; ?>" pattern="0\d{4}|[1-9]\d{4}" placeholder="Código postal" title="El código postal debe tener 5 dígitos" required>
                        </div>
                        <div class="mb-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $provincia; ?>" placeholder="Provincia" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" pattern="[9|6|7][0-9]{8}" minlength="9" value="<?php echo $telefono; ?>" placeholder="Teléfono" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="index.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>