<?php
session_start();

include '../php/ConexionDB.php';
include_once '../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cod_cat = $_POST['cod_cat'];
    $nom_cat = $_POST['nom_cat'];
    $cod_sub = $_POST['cod_sub'];
    $nom_sub = $_POST['nom_sub'];
   
    
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();

   
    if ($conn) {
        
        $sql = "UPDATE categorias SET nom_cat = '$nom_cat', nom_sub = '$nom_sub', activo = 'S' WHERE cod_cat = '$cod_cat' AND cod_sub = '$cod_sub'";

        if ($conn->query($sql) === TRUE) {
            
            $_SESSION['categoria_activada'] = 'Categoría activada correctamente.';
            $_SESSION['subcategoria_activada'] = 'Subcategoría activada correctamente.';
            header('Location: ../index.php?page=categoriasInactivas');
            exit();
        } else {
            $_SESSION['error_actualizacion'] = 'Error en la actualizacion: ' . $conn->error;
            header('Location: ../index.php?page=categorias');
            exit();
        }

        $conexionDB->cerrarConexion();
    } else {
        
        $_SESSION['error_conexion'] = 'Error de conexión a la base de datos: ' . mysqli_connect_error();
        header('Location: ../index.php?page=categoriasInactivas');
        exit();
    }
}


header('Location: ../index.php?page=categoriasInactivas');
exit();
?>
