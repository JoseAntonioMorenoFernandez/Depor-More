<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;

include_once './php/funciones_usuario.php';
include_once './php/ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;

require_once './php/config.php';
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$conn = $conexionDB->obtenerConexion();
$is_user_registered = false;

if ($email_usuario) {
    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        $is_user_registered = true;
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
}

$conn->close();
?>

<div class="container">
    <h1 class="text-center mt-3 fs-3 fw-semibold mt-2">
        <?php echo $is_user_registered ? 'Información del Usuario' : 'Formulario de Registro'; ?>
    </h1>
    <div class="row justify-content-center bg-light p-3">
        <div class="col-lg-12">
            <?php if (!$is_user_registered) : ?>
                <!-- Mostrar mensajes de error si existen -->
                <?php if (isset($_SESSION['error_dni'])) : ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_dni']; ?></div>
                    <?php unset($_SESSION['error_dni']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_password'])) : ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_password']; ?></div>
                    <?php unset($_SESSION['error_password']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_email'])) : ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_email']; ?></div>
                    <?php unset($_SESSION['error_email']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['error_registro'])) : ?>
                    <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_registro']; ?></div>
                    <?php unset($_SESSION['error_registro']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['registro_exitoso'])) : ?>
                    <div class="alert alert-success" role="alert"><?php echo $_SESSION['registro_exitoso']; ?></div>
                    <?php unset($_SESSION['registro_exitoso']); ?>
                <?php endif; ?>

                <!-- Formulario de registro -->
                <form action="./php/registro_usuario.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>" placeholder="Nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo isset($_SESSION['apellidos']) ? $_SESSION['apellidos'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni" pattern="[0-9]{8}[a-zA-Z]" title="Introduzca 8 dígitos y una letra" value="<?php echo isset($_SESSION['dni']) ? $_SESSION['dni'] : ''; ?>" maxlength="9" placeholder="DNI" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" maxlength="50" pattern="[a-zA-Z0-9.!#$%&amp;’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+" placeholder="nombre@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" title="La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos ni la letra ñ o Ñ." value="" placeholder="Introduce mínimo 8 caracteres" minlength="8" maxlength="16" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Repetir Contraseña</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" title="La contraseña debe tener entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula. NO puede tener otros símbolos ni la letra ñ o Ñ." value="" placeholder="Repetir contraseña" minlength="8" maxlength="16" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary m-4" name="submit" id="submit">Enviar</button>
                        <a href="index.php" class="btn btn-success m-4">Cancelar</a>
                    </div>
                </form>

                <?php
                unset($_SESSION['nombre']);
                unset($_SESSION['apellidos']);
                unset($_SESSION['dni']);
                unset($_SESSION['email']);
                ?>
            <?php else : ?>


                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="./carrito/actualizar_usuario2.php" method="POST">
                                        <div class="container-fluid"> 
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label for="apellidos" class="form-label">Apellidos</label>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label for="dni" class="form-label">DNI</label>
                                                    <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-md-3">
                                                    <label for="direccion" class="form-label">Dirección</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>" placeholder="Dirección" required>
                                                </div>
                                                <div class="mb-3 col-md-3">
                                                    <label for="localidad" class="form-label">Localidad</label>
                                                    <input type="text" class="form-control" id="localidad" name="localidad" value="<?php echo $localidad; ?>" placeholder="Localidad" required>
                                                </div>
                                                <div class="mb-3 col-md-2">
                                                    <label for="cpostal" class="form-label">Código Postal</label>
                                                    <input type="text" class="form-control" id="cpostal" name="cpostal" value="<?php echo $cpostal; ?>" pattern="[0-9]{5}" placeholder="Código Postal" required>
                                                </div>
                                                <div class="mb-3 col-md-2">
                                                    <label for="provincia" class="form-label">Provincia</label>
                                                    <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $provincia; ?>" placeholder="Provincia" required>
                                                </div>

                                                <div class="mb-3 col-md-2">
                                                    <label for="telefono" class="form-label">Teléfono</label>
                                                    <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>" pattern="[0-9]{9}" placeholder="Teléfono" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col text-center"> 
                                                    <button type="submit" class="btn btn-primary m-4">Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col">
        <a href="index.php?page=carrito" class="btn btn-primary">Cancelar</a>
    </div>
    <div class="col text-end">
        <a href="./carrito/compra_realizada.php" class="btn btn-success">Comprar</a>
    </div>
</div>
