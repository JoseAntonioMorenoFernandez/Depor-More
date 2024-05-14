<?php


$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener las categorías existentes
$sql = "SELECT * FROM articulos WHERE activo = 'N'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    
    $articulos = array();
    
    while ($fila = $resultado->fetch_assoc()) {
        $articulos[] = $fila;
    }
} else {
    $articulos = array(); 
}

$conexionDB->cerrarConexion();

return $articulos;
?>
