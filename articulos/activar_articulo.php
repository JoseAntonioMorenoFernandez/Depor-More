<?php
session_start();

include '../php/ConexionDB.php';
include_once '../php/config.php';

// Sesion error
$_SESSION['error_actualizacion'] = '';

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ean = $_POST['ean'];

    // Conexión base de datos
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();


    if ($conn) {

        $sql = "UPDATE articulos SET activo = 'S' WHERE ean = '$ean'";

        if ($conn->query($sql) === TRUE) {

            $_SESSION['articulo_desactivado'] = 'Artículo desactivado correctamente.';
            header('Location: ../index.php?page=mantenimientoArticulo');
            exit();
        } else {

            $_SESSION['error_actualizacion'] = 'Error en la actualización: ' . $conn->error;
        }


        $conexionDB->cerrarConexion();
    } else {

        $_SESSION['error_conexion'] = 'Error de conexión a la base de datos: ' . mysqli_connect_error();
    }
}


header('Location: ../index.php?page=mantenimientoArticulo');
exit();
