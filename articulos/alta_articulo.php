<?php
session_start();

include '../php/ConexionDB.php';
include_once '../php/config.php';


if (isset($_SESSION['error_alta'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_alta'] . '</div>';
    // Limpiar la variable de sesión después de mostrar el mensaje
    unset($_SESSION['error_alta']);
}

// Variables del formulario
$ean_value = isset($_SESSION['ean']) ? $_SESSION['ean'] : '';
$nombre_value = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$descripcion_value = isset($_SESSION['descripcion']) ? $_SESSION['descripcion'] : '';
$precio_value = isset($_SESSION['precio']) ? $_SESSION['precio'] : '';
$descuento_value = isset($_SESSION['descuento']) ? $_SESSION['descuento'] : '';
$categoria_value = isset($_SESSION['nom_cat']) ? $_SESSION['nom_cat'] : '';
$subcategoria_value = isset($_SESSION['nom_sub']) ? $_SESSION['nom_sub'] : '';

// Verificacion envio formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ean = $_POST['ean'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen1 = $_FILES['imagen1'];
    $imagen2 = $_FILES['imagen2'];
    $descuento = $_POST['descuento'];
    $categoria = $_POST['categoria'];
    $subcategoria = $_POST['subcategoria'];

    // Guardar variables de sesión
    $_SESSION['ean'] = $ean;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['descripcion'] = $descripcion;
    $_SESSION['precio'] = $precio;
    $_SESSION['descuento'] = $descuento;
    $_SESSION['categoria'] = $categoria;
    $_SESSION['subcategoria'] = $subcategoria;

    // Verificación seleccion de opcion 
    if (!empty($categoria)) {
        // Conecta con la base de datos
        $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn = $conexionDB->obtenerConexion();

        
        $sql_verificar_ean = "SELECT * FROM articulos WHERE ean = '$ean'";
        $resultado_verificar_ean = $conn->query($sql_verificar_ean);

        if ($resultado_verificar_ean->num_rows > 0) {
            
            $_SESSION['error_alta'] = 'Error: Código EAN registrado.';
            header('Location: ../index.php?page=altaArticulo');
            exit();
        }

        
        if ($imagen1['error'] == 0) {
            $permitidos = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
            $extension1 = pathinfo($imagen1['name'], PATHINFO_EXTENSION);

            
            if (in_array($extension1, $permitidos)) {
                
                if ($imagen1['size'] <= 300000) {
                    $carpeta_destino = '../imagenes/articulos/';
                    $ruta_imagen1 = $carpeta_destino . $imagen1['name'];
                    move_uploaded_file($imagen1['tmp_name'], $ruta_imagen1);
                } else {
                    $_SESSION['error_alta'] = 'Error: tamaño de la primera imagen no permitido.';
                }
            } else {
                $_SESSION['error_alta'] = 'Error: formato de la primera imagen no permitido.';
            }
        } else {
            $_SESSION['error_alta'] = 'Error: subir la primera imagen es obligatorio.';
        }

        
        if ($imagen2['error'] == 0) {
            $permitidos = ['jpg', 'jpeg', 'gif', 'png', 'webp'];
            $extension2 = pathinfo($imagen2['name'], PATHINFO_EXTENSION);

            if (in_array($extension2, $permitidos)) {
                
                if ($imagen2['size'] <= 300000) {
                    $ruta_imagen2 = $carpeta_destino . $imagen2['name'];
                    move_uploaded_file($imagen2['tmp_name'], $ruta_imagen2);
                } else {
                    $_SESSION['error_alta'] = 'Error: tamaño de la segunda imagen no permitido.';
                }
            } else {
                $_SESSION['error_alta'] = 'Error: formato de la segunda imagen no permitido.';
            }
        }

        // Insertar el nuevo registro en la base de datos 
        if (!isset($_SESSION['error_alta'])) {
            $sql = "INSERT INTO articulos (ean, nombre, descripcion, categoria, subcategoria, precio, imagen1, imagen2, descuento) 
                    VALUES ('$ean', '$nombre', '$descripcion', '$categoria', '$subcategoria', '$precio', '$ruta_imagen1', '$ruta_imagen2', '$descuento')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['articulo_agregado'] = 'Artículo añadido correctamente.';
                
                $conexionDB->cerrarConexion();
                
                header('Location: ../index.php?page=altaArticulo');
                exit();
            } else {
                $_SESSION['error_alta'] = 'Error al guardar artículo: ' . $conn->error;
            }
        }
    } else {
        $_SESSION['error_alta'] = 'No se ha seleccionado ninguna opción de categoría y subcategoría.';
    }
}


header('Location: ../index.php?page=altaArticulo');
exit();
?>
