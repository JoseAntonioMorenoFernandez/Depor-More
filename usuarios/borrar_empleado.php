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

   
    $sql = "UPDATE usuarios SET activo='N' WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);

    
    if ($stmt->execute()) {
        
        $_SESSION['success_message'] = 'Empleado desactivado correctamente.';
    } else {
        
        $_SESSION['error_message'] = 'Error al desactivar el empleado.';
    }

    
    $conn->close();


    
    header('Location: ../index.php?page=mantenimientoEmpleados');
    exit();
} else {
    
    header('Location: ../index.php?page=mantenimientoEmpleados');
    exit();
}
?>
