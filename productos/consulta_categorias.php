<?php

$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT * FROM categorias WHERE activo = 'S' ORDER BY cod_cat ASC, cod_sub ASC";
$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {
    
    $categorias = array();
    
    
    while ($fila = $resultado->fetch_assoc()) {
        $categorias[] = $fila;
    }
} else {
    $categorias = array(); 
}


$conexionDB->cerrarConexion();

return $categorias;
?>
