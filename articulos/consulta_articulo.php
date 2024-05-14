<?php


$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT * FROM articulos WHERE activo = 'S'";

// Verificar si se han enviado datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ordenar = $_POST['ordenar'];
    $tipo = $_POST['tipo'];
    $buscar = $_POST['buscar'];

        
    if (!empty($buscar)) {
        $sql .= " AND (nombre LIKE '%$buscar%' OR descripcion LIKE '%$buscar%')";
    }

    
    if (!empty($ordenar) && !empty($tipo)) {
        $sql .= " ORDER BY $ordenar $tipo";
    }
}



$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {
    // Crear un array para almacenar las filas de articulos
    $articulos = array();
    
    // Obtener las filas de categorías
    while ($fila = $resultado->fetch_assoc()) {
        $articulos[] = $fila;
    }
} else {
    $articulos = array(); 
}


$conexionDB->cerrarConexion();


return $articulos;
?>
