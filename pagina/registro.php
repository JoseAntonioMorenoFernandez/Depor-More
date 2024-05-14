<?php

include 'breadcrumb.php';
echo $breadcrumbs;


?>

<div class="container">
    <h1 class="text-center mt-3 fs-3 fw-semibold mt-2">Formulario de Registro</h1>
    <div class="row justify-content-center bg-light p-3">
        <div class="col-lg-6">
            <!-- Mostrar mensajes de error si existen -->
            <?php if (isset($_SESSION['error_dni'])) : ?>
                <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_dni']; ?></div>
                <?php unset($_SESSION['error_dni']); // Limpia la variable de sesión 
                ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_password'])) : ?>
                <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_password']; ?></div>
                <?php unset($_SESSION['error_password']); // Limpia la variable de sesión 
                ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_email'])) : ?>
                <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_email']; ?></div>
                <?php unset($_SESSION['error_email']); // Limpia la variable de sesión 
                ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error_registro'])) : ?>
                <div class="alert alert-danger" role="alert"><?php echo $_SESSION['error_registro']; ?></div>
                <?php unset($_SESSION['error_registro']); // Limpia la variable de sesión 
                ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['registro_exitoso'])) : ?>
                <div class="alert alert-success" role="alert"><?php echo $_SESSION['registro_exitoso']; ?></div>
                <?php unset($_SESSION['registro_exitoso']); // Limpia la variable de sesión 
                ?>
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
        </div>
    </div>
</div>

<?php
unset($_SESSION['nombre']);
unset($_SESSION['apellidos']);
unset($_SESSION['dni']);
unset($_SESSION['email']);
?>