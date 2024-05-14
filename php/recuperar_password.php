<?php

include_once './ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        
        $_SESSION['error_message'] = 'Las contraseñas no coinciden.';

        $_SESSION['form_data'] = [
            'nombre' => $nombre,
            'dni' => $dni,
            'email' => $email
        ];

        header('Location: ../index.php?page=recuperarPassword');
        exit();
    }

  
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    require_once 'config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "SELECT * FROM usuarios WHERE nombre=? AND dni=? AND email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $dni, $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        
        $usuario = $resultado->fetch_assoc();
        
        if ($usuario['activo'] == 'S') {

            $sql_update = "UPDATE usuarios SET password=? WHERE nombre=? AND dni=? AND email=?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssss", $password_hash, $nombre, $dni, $email);

         
            if ($stmt_update->execute()) {
                
                $_SESSION['success_message'] = 'Contraseña actualizada correctamente.';
            } else {
               
                $_SESSION['error_message'] = 'Error al actualizar la contraseña.';
            }
        } else {
            
            $_SESSION['error_message'] = 'Tu cuenta no está activa. Por favor, ponte en contacto con el administrador.';
        }
    } else {
        
        $_SESSION['error_message'] = 'Los datos proporcionados no son correctos o el usuario no está activo.';
    }

    $conn->close();

    header('Location: ../index.php?page=recuperarPassword');

    exit();
} else {

    header('Location: ../index.php?page=recuperarPassword');
    exit();
}
?>
