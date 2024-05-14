<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmacion']) && $_POST['confirmacion'] === "si") {
   
    include_once '../php/ConexionDB.php';


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $email_usuario = $_SESSION['email'];

    require_once 'config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET activo='N' WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario);

    if ($stmt->execute()) {
        
        include '../php/cerrarSesion.php';
        
        header('Location: ../index.php?page=inicio');
        exit();
    } else {

        echo "Se ha producido un error";
    }

    $conn->close();
} else {
    
    header('Location: ../index.php?page=inicio');
    exit();
}
