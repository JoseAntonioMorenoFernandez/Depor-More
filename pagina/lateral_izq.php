<!-- menu_lateral.php -->
<?php
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM categorias WHERE activo = 'S' ORDER BY cod_cat, cod_sub";
$resultado = $conn->query($sql);

$categorias = array();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $categoria = $fila['nom_cat'];
        $subcategoria = $fila['nom_sub'];
        
        $categorias[$categoria][] = $subcategoria;
    }
}

echo '<a class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">';
echo '<span class="fs-4 fw-semibold">Categorias</span>';
echo '</a>';
echo '<ul class="list-unstyled ps-0">';

foreach ($categorias as $categoria => $subcategorias) {
    echo '<li class="mb-1">';
    echo '<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#' . strtolower(str_replace(' ', '-', $categoria)) . '-collapse" aria-expanded="false">' . $categoria . '</button>';
    echo '<div class="collapse" id="' . strtolower(str_replace(' ', '-', $categoria)) . '-collapse">';
    echo '<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">';
    foreach ($subcategorias as $subcategoria) {
        echo '<li><a href="index.php?categoria=' . urlencode($categoria) . '&subcategoria=' . urlencode($subcategoria) . '" class="link-dark rounded">' . $subcategoria . '</a></li>';
    }
    
    echo '</ul>';
    echo '</div>';
    echo '</li>';
    echo '<hr class="d-none d-sm-block" >'; 
}

echo '</ul>';
?>
