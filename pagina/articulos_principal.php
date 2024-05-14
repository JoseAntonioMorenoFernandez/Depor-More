<?php

function obtenerTodosLosArticulosAleatorios() {
   
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM articulos WHERE activo = 'S' ORDER BY RAND()";

    $resultado = $conn->query($sql);

    $articulos = array();

    if ($resultado->num_rows > 0) {
       
        while ($fila = $resultado->fetch_assoc()) {
            $articulos[] = $fila;
        }
    }

    $conexionDB->cerrarConexion();

    return $articulos;
}

// Función para obtener los artículos de una página específica
function obtenerArticulosPaginados($articulos, $paginaActual, $articulosPorPagina) {
    
    $indiceInicio = ($paginaActual - 1) * $articulosPorPagina;
    $indiceFin = $indiceInicio + $articulosPorPagina;

    $articulosPagina = array_slice($articulos, $indiceInicio, $articulosPorPagina);

    return $articulosPagina;
}

// Verificar si se ha seleccionado una categoría y subcategoría
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$subcategoriaSeleccionada = isset($_GET['subcategoria']) ? $_GET['subcategoria'] : null;

if ($categoriaSeleccionada && $subcategoriaSeleccionada) {
    
    function obtenerArticulosPorCategoria($categoria, $subcategoria) {
        
        $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $conn = $conexionDB->obtenerConexion();

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM articulos WHERE activo = 'S' AND categoria = ? AND subcategoria = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $categoria, $subcategoria);

        $stmt->execute();

        $resultado = $stmt->get_result();

        $articulos = array();

        if ($resultado->num_rows > 0) {
            
            while ($fila = $resultado->fetch_assoc()) {
                $articulos[] = $fila;
            }
        }

        $conexionDB->cerrarConexion();

        return $articulos;
    }

    $articulos = obtenerArticulosPorCategoria($categoriaSeleccionada, $subcategoriaSeleccionada);
} else {

    $articulos = obtenerTodosLosArticulosAleatorios();
}


$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$articulosPorPagina = 9;

$articulosPagina = obtenerArticulosPaginados($articulos, $paginaActual, $articulosPorPagina);

return $articulosPagina;

?>
