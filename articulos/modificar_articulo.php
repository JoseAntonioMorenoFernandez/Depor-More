<?php
session_start();

include '../php/ConexionDB.php';
include_once '../php/config.php';


$_SESSION['error_actualizacion'] = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $ean = $_POST['ean'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];

    // variables para las rutas de las imágenes
    $ruta_imagen1 = '';
    $ruta_imagen2 = '';

    if ($_FILES['imagen1']['error'] === UPLOAD_ERR_OK) {
        $imagen1 = $_FILES['imagen1'];
        $permitidos = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
        $extension1 = pathinfo($imagen1['name'], PATHINFO_EXTENSION);

        if (in_array($extension1, $permitidos)) {
            
            if ($imagen1['size'] <= 300000) {
                $carpeta_destino = '../imagenes/articulos/';
                $ruta_imagen1 = $carpeta_destino . $imagen1['name'];
                move_uploaded_file($imagen1['tmp_name'], $ruta_imagen1);
            } else {
                $_SESSION['error_actualizacion'] = 'Error: tamaño de la primera imagen no permitido.';
                header('Location: ../index.php?page=mantenimientoArticulo');
                exit();
            }
        } else {
            $_SESSION['error_actualizacion'] = 'Error: formato de la primera imagen no permitido.';
            header('Location: ../index.php?page=mantenimientoArticulo');
            exit();
        }
    }

    if ($_FILES['imagen2']['error'] === UPLOAD_ERR_OK) {
        $imagen2 = $_FILES['imagen2'];
        $permitidos = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
        $extension2 = pathinfo($imagen2['name'], PATHINFO_EXTENSION);

        if (in_array($extension2, $permitidos)) {

            if ($imagen2['size'] <= 300000) {
                $carpeta_destino = '../imagenes/articulos/';
                $ruta_imagen2 = $carpeta_destino . $imagen2['name'];
                move_uploaded_file($imagen2['tmp_name'], $ruta_imagen2);
            } else {
                $_SESSION['error_actualizacion'] = 'Error: tamaño de la segunda imagen no permitido.';
                header('Location: ../index.php?page=mantenimientoArticulo');
                exit();
            }
        } else {
            $_SESSION['error_actualizacion'] = 'Error: formato de la segunda imagen no permitido.';
            header('Location: ../index.php?page=mantenimientoArticulo');
            exit();
        }
    }

    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();

    if ($conn) {
        
        if (!empty($categoria)) {
            
            $sql = "UPDATE articulos SET 
                    nombre = '$nombre',
                    descripcion = '$descripcion',
                    categoria = '$categoria',
                    subcategoria = '$subcategoria',
                    precio = '$precio',
                    descuento = '$descuento'";
            
            if (!empty($ruta_imagen1)) {
                $sql .= ", imagen1 = '$ruta_imagen1'";
            }
            if (!empty($ruta_imagen2)) {
                $sql .= ", imagen2 = '$ruta_imagen2'";
            }
            
            $sql .= " WHERE ean = '$ean'";

            if ($conn->query($sql) === TRUE) {
                
                $_SESSION['articulo_actualizado'] = 'Artículo actualizado correctamente.';
                header('Location: ../index.php?page=mantenimientoArticulo');
                exit();
            } else {
                
                $_SESSION['error_actualizacion'] = 'Error en la actualización: ' . $conn->error;
            }
        } else {
            $_SESSION['error_actualizacion'] = 'No se ha seleccionado ninguna opción de categoría y subcategoría.';
        }

        
        $conexionDB->cerrarConexion();
    } else {
        
        $_SESSION['error_conexion'] = 'Error de conexión a la base de datos: ' . mysqli_connect_error();
    }
}

header('Location: ../index.php?page=mantenimientoArticulo');
exit();
?>
