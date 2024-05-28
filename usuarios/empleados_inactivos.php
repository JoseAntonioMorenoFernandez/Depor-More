<?php


$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT * FROM usuarios WHERE activo = 'N' AND (rol = 'empleado' OR rol = 'administrador') ";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ordenar = $_POST['ordenar'];
    $tipo = $_POST['tipo'];
    $buscar = $_POST['buscar'];

        
    if (!empty($buscar)) {
        $sql .= " AND (nombre LIKE '%$buscar%' OR apellidos LIKE '%$buscar%' OR email LIKE '%$buscar%' 
        OR dni LIKE '%$buscar%' OR direccion LIKE '%$buscar%' OR localidad LIKE '%$buscar%' OR cpostal LIKE '%$buscar%'
        OR provincia LIKE '%$buscar%' OR telefono LIKE '%$buscar%' OR rol LIKE '%$buscar%' OR activo LIKE '%$buscar%')";
    }

    
    if (!empty($ordenar) && !empty($tipo)) {
        $sql .= " ORDER BY $ordenar $tipo";
    }
}


$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    
    $usuarios = array();
    
    
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
} else {
    $usuarios = array(); 
}


$conexionDB->cerrarConexion();

return $usuarios;
?>
