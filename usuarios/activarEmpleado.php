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

if (isset($_SESSION['activar_empleado'])) {
    $activar_empleado = $_SESSION['activar_empleado'];
 
    $email = $activar_empleado['email'];
    $dni = $activar_empleado['dni'];
    $nombre = $activar_empleado['nombre'];
    $apellidos = $activar_empleado['apellidos'];
    $direccion = $activar_empleado['direccion'];
    $localidad = $activar_empleado['localidad'];
    $cpostal = $activar_empleado['cpostal'];
    $provincia = $activar_empleado['provincia'];
    $telefono = $activar_empleado['telefono'];
    $rol = $activar_empleado['rol'];
   
    unset($_SESSION['activar_empleado']);
}
?>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
        
            <div class="bg-danger text-white p-2 mb-2 text-center">
                <h3>Activar Empleado</h3>
            </div>
            <div class="card">

                <div class="card-body">
                    <form action="./usuarios/activar_empleado.php" method="POST">
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
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $localidad; ?>" placeholder="Localidad" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="cpostal" class="form-label">Código postal</label>
                            <input type="text" class="form-control" id="cpostal" name="cpostal" value="<?php echo $cpostal; ?>" pattern="0\d{4}|[1-9]\d{4}" placeholder="Código postal" title="El código postal debe tener 5 dígitos" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="provincia" class="form-label">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $provincia; ?>" placeholder="Provincia" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" pattern="[9|6|7][0-9]{8}" minlength="9" value="<?php echo $telefono; ?>" placeholder="Teléfono" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="rol" class="form-label">Rol:</label>
                            <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $rol; ?>" placeholder="rol" readonly>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Confirmar Activar</button>
                            <a href="index.php?page=mantenimientoClientes" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>