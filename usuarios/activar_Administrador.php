<?php

include_once '../php/ConexionDB.php';
require_once '../php/config.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $email = $_POST['email'] ?? '';

    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    
    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET activo='S' WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

 
    if ($stmt->execute()) {
       
        $_SESSION['success_message'] = 'Administrador activado correctamente.';
    } else {
        
        $_SESSION['error_message'] = 'Error al activar el administrador.';
    }
   
    $conn->close();

    header('Location: ../index.php?page=administradoresInactivos');
    exit();
} else {
    
    header('Location: ../index.php?page=administradoresInactivos');
    exit();
}
?>
