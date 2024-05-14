<?php

include_once './ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Verifica que las contraseñas coincidan
    if ($password != $confirm_password) {
        // Si las contraseñas no coinciden, muestra un mensaje de error
        $_SESSION['error_message'] = 'Las contraseñas no coinciden.';

       
        header('Location: ../index.php?page=cambiarPassword');
        exit();
    }


    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $email = $_SESSION['email'];

    require_once 'config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET password=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $password_hash, $email);

    if ($stmt->execute()) {
      
        $_SESSION['success_message'] = 'Contraseña actualizada correctamente.';
    } else {
        
        $_SESSION['error_message'] = 'Error al actualizar la contraseña.';
    }

    $conn->close();

  
    header('Location: ../index.php?page=cambiarPassword');
    exit();
} else {
   
    header('Location: ../index.php?page=cambiarPassword');
    exit();
}
