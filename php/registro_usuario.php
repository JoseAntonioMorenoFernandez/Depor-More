<?php session_start(); ?>

<?php
include 'ConexionDB.php';
include 'funciones_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellidos'] = $apellidos;
    $_SESSION['dni'] = $dni;
    $_SESSION['email'] = $email;
    $_SESSION['nombre_usuario'] = $nombre;

    
    if (!validarDNI($dni)) {
        $_SESSION['error_dni'] = 'El DNI no es válido.';
        header('Location: ../index.php?page=registro');
        exit();
    }

    if ($password != $confirm_password) {
        $_SESSION['error_password'] = 'Las contraseñas no coinciden.';
    } else {
        
        $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn = $conexionDB->obtenerConexion();

        $sql_email = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_dni = "SELECT * FROM usuarios WHERE dni = '$dni'";

        $result_email = $conn->query($sql_email);
        $result_dni = $conn->query($sql_dni);

        if ($result_email->num_rows > 0) {
            $_SESSION['error_email'] = 'El usuario ya existe.';
        } elseif ($result_dni->num_rows > 0) {
            $_SESSION['error_dni'] = 'El DNI ya está registrado.';
        } else {
           
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (nombre, apellidos, dni, email, password) VALUES ('$nombre', '$apellidos', '$dni', '$email', '$password_hash')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['registro_exitoso'] = 'Usuario registrado.';
                header('Location: ../index.php?page=registroCompletado');
                exit();

            } else {
                $_SESSION['error_registro'] = 'Error al registrar el usuario: ' . $conn->error;
            }
        }

        $conexionDB->cerrarConexion();
    }
}




if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'cliente') {
    
    header('Location: ../pagina/loginCliente.php');
    exit();
}

if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'empleado') {
    
    header('Location: ../pagina/loginEmpleado.php');
    exit(); 
}

if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'administrador') {
    
    header('Location: ../pagina/loginAdministrador.php');
    exit(); 
}

header('Location: ../index.php?page=registro');
?>
