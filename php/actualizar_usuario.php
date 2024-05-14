<?php

include_once './ConexionDB.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $cpostal = $_POST['cpostal'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];

    if (!preg_match('/^[9|6|7][0-9]{8}$/', $telefono)) {
        
        $_SESSION['error_message'] = 'Por favor, introduce un número de teléfono válido';

        header('Location: ../index.php?page=miCuenta');
        exit();
    }


    require_once 'config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET nombre=?, apellidos=?, dni=?, direccion=?, localidad=?, cpostal=?, provincia=?, telefono=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $nombre, $apellidos, $dni, $direccion, $localidad, $cpostal, $provincia, $telefono, $email);

    if ($stmt->execute()) {
        
        $_SESSION['success_message'] = 'Datos actualizados correctamente.';
    } else {
        
        $_SESSION['error_message'] = 'Error al actualizar los datos.';
    }

    $conn->close();

    header('Location: ../index.php?page=miCuenta');
    exit();
} else {
    
    header('Location: ../index.php?page=miCuenta');
    exit();
}
