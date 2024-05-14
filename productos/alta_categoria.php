<?php
session_start();

include '../php/ConexionDB.php';
include_once '../php/config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cod_cat = $_POST['codigo_categoria'];
    $nom_cat = $_POST['nombre_categoria'];
    $cod_sub = $_POST['codigo_subcategoria'];
    $nom_sub = $_POST['nombre_subcategoria'];

  
    if (empty($cod_cat) || empty($nom_cat)) {
        $_SESSION['error_categoria'] = 'Los campos de código y nombre de categoría son obligatorios.';
        header('Location: ../index.php?page=categorias');
        exit();
    }

   
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();

    
    if ($conn) {
        
        if (!empty($cod_cat)) {
            $sql_check_category = "SELECT * FROM categorias WHERE cod_cat = '$cod_cat'";
            $result_check_category = $conn->query($sql_check_category);

            if ($result_check_category === false) {
                $_SESSION['error_categoria'] = 'Error al verificar la categoría: ' . $conn->error;
                header('Location: ../index.php?page=categorias');
                exit();
            }

            if ($result_check_category->num_rows > 0) {
                
                $row = $result_check_category->fetch_assoc();
                if ($row['nom_cat'] != $nom_cat) {
                    
                    $_SESSION['error_categoria'] = 'El nombre de la categoría no coincide con el registrado anteriormente.';
                    header('Location: ../index.php?page=categorias');
                    exit();
                }
            }
        }

        
        if (empty($cod_cat) || empty($nom_cat)) {
            $sql_insert_category = "INSERT INTO categorias (cod_cat, nom_cat) VALUES ('$cod_cat', '$nom_cat')";
            if ($conn->query($sql_insert_category) === FALSE) {
                $_SESSION['error_categoria'] = 'Error al crear la categoría: ' . $conn->error;
                header('Location: ../index.php?page=categorias');
                exit();
            }
        }

        
        if (empty($cod_cat) || empty($nom_cat)) {
            
            $_SESSION['error_categoria'] = 'Debe especificar una categoría antes de añadir una subcategoría.';
            header('Location: ../index.php?page=categorias');
            exit();
        }

        $sql_check_subcategory = "SELECT * FROM categorias WHERE cod_sub = '$cod_sub'";
        $result_check_subcategory = $conn->query($sql_check_subcategory);

        if ($result_check_subcategory === false) {
            $_SESSION['error_subcategoria'] = 'Error al verificar la subcategoría: ' . $conn->error;
            header('Location: ../index.php?page=categorias');
            exit();
        }

        if ($result_check_subcategory->num_rows > 0) {
            
            $row = $result_check_subcategory->fetch_assoc();
            if ($row['nom_sub'] != $nom_sub) {
                
                $_SESSION['error_subcategoria'] = 'El nombre de la subcategoría no coincide con el registrado anteriormente.';
                header('Location: ../index.php?page=categorias');
                exit();
            }
        }

        
        $sql = "INSERT INTO categorias (cod_cat, nom_cat, cod_sub, nom_sub) VALUES ('$cod_cat', '$nom_cat', '$cod_sub', '$nom_sub')";

        if ($conn->query($sql) === TRUE) {
            
            $_SESSION['categoria_agregada'] = 'Categoría añadida correctamente.';
            header('Location: ../index.php?page=categorias');
            exit();
        } else {
            $_SESSION['error_alta'] = 'Error al crear la categoría: ' . $conn->error;
            header('Location: ../index.php?page=categorias');
            exit();
        }

     
        $conexionDB->cerrarConexion();
    } else {
        
        $_SESSION['error_conexion'] = 'Error de conexión a la base de datos: ' . mysqli_connect_error();
        header('Location: ../index.php?page=categorias');
        exit();
    }
}


header('Location: ../index.php?page=categorias');
exit(); 
?>
