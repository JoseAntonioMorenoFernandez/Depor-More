<?php
include './pagina/breadcrumb.php';
echo $breadcrumbs;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'] ?? '';
    $dni = $_POST['dni'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $localidad = $_POST['localidad'] ?? '';
    $cpostal = $_POST['cpostal'] ?? '';
    $provincia = $_POST['provincia'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $rol = $_POST['rol'] ?? '';
}

if (isset($_SESSION['datos_actualizados'])) {
    $datos_actualizados = $_SESSION['datos_actualizados'];
    
    $email = $datos_actualizados['email'];
    $dni = $datos_actualizados['dni'];
    $nombre = $datos_actualizados['nombre'];
    $apellidos = $datos_actualizados['apellidos'];
    $direccion = $datos_actualizados['direccion'];
    $localidad = $datos_actualizados['localidad'];
    $cpostal = $datos_actualizados['cpostal'];
    $provincia = $datos_actualizados['provincia'];
    $telefono = $datos_actualizados['telefono'];
    $rol = $datos_actualizados['rol'];
    
    unset($_SESSION['datos_actualizados']);
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
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
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <h3>Modificar Empleado</h3>
            </div>
            <div class="card">

                <div class="card-body">
                    <form action="./usuarios/modificar_empleado.php" method="POST">
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
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <select class="form-select" id="rol" name="rol">
                                <option value="CLIENTE" <?php echo isset($rol) && $rol === 'cliente' ? 'selected' : ''; ?>>Cliente</option>
                                <option value="EMPLEADO" <?php echo isset($rol) && $rol === 'empleado' ? 'selected' : ''; ?>>Empleado</option>
                                <option value="ADMINISTRADOR" <?php echo isset($rol) && $rol === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="index.php?page=mantenimientoEmpleados" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>