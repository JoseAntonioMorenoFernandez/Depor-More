<?php

include_once '../php/ConexionDB.php';
require_once '../php/config.php';

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
    $rol = $_POST['rol'];

    if (!preg_match('/^[9|6|7][0-9]{8}$/', $telefono)) {
        
        $_SESSION['error_message'] = 'Por favor, introduce un número de teléfono válido';

        
        header('Location: ../index.php?page=modificarEmpleado');
        exit();
    }

        $_SESSION['datos_actualizados'] = array(
            'email' => $email,
            'dni' => $dni,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'localidad' => $localidad,
            'cpostal' => $cpostal,
            'provincia' => $provincia,
            'telefono' => $telefono,
            'rol' => $rol,
        );

    

    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

   
    $conn = $conexionDB->obtenerConexion();

    $sql = "UPDATE usuarios SET nombre=?, apellidos=?, dni=?, direccion=?, localidad=?, cpostal=?, provincia=?, telefono=?, rol=? WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $nombre, $apellidos, $dni, $direccion, $localidad, $cpostal, $provincia, $telefono, $rol,  $email);

    
    if ($stmt->execute()) {
        
        $_SESSION['success_message'] = 'Datos actualizados correctamente.';
    } else {
        
        $_SESSION['error_message'] = 'Error al actualizar los datos.';
    }

    
    $conn->close();


    header('Location: ../index.php?page=modificarEmpleado');
    exit();
} else {
   
    header('Location: ../index.php?page=modificarEmpleado');
    exit();
}
