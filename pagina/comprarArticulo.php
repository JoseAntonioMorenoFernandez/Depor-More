<?php

if (isset($_POST['art_id'])) {

    $articulo_id = $_POST['art_id'];

} else {
    
    echo "No se recibió el ID del artículo.";
    exit;
}


function obtenerDetallesArticulo($articulo_id)
{
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM articulos WHERE id_art = $articulo_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $articulo = array(
            'id_art' => $row['id_art'],
            'ean' => $row['ean'],
            'nombre' => $row['nombre'],
            'descripcion' => $row['descripcion'],
            'categoria' => $row['categoria'],
            'subcategoria' => $row['subcategoria'],
            'precio' => $row['precio'],
            'imagen1' => $row['imagen1'],
            'imagen2' => $row['imagen2'],
            'descuento' => $row['descuento'],
            'talla_hom_zap' => $row['talla_hom_zap'],
            'talla_muj_zap' => $row['talla_muj_zap'],
            'talla_nin_zap' => $row['talla_nin_zap'],
            'talla_hom_rop' => $row['talla_hom_rop'],
            'talla_muj_rop' => $row['talla_muj_rop'],
            'talla_nin_rop' => $row['talla_nin_rop']
        );
    } else {
        
        $articulo = array();
    }

    $conn->close();

    return $articulo;
}

// Obtener los detalles del artículo 
$articulo = obtenerDetallesArticulo($articulo_id);

?>

<div class="col-lg-12">
    <div class="card h-100 overflow-hidden">
        <div class="col-lg-12 mt-4">
            <div class="card h-100 overflow-hidden">
                <div class="row">
                    <div class="col">
                        <div class="imagen-container2">
                            <img class="imagen1" src="ruta_imagenes/<?php echo $articulo['imagen1']; ?>" alt="Imagen 1" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col">
                        <div class="imagen-container2">
                            <img class="imagen2" src="ruta_imagenes/<?php echo $articulo['imagen2']; ?>" alt="Imagen 2" style="width: 100%;">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body d-flex flex-column">
            <h1 class="card-title fw-bold mt-5 mb-5"><?php echo $articulo['nombre']; ?></h1>
            <h3 class="card-text mt-5 mb-5"><?php echo $articulo['descripcion']; ?></h3>
            <h4 class="card-text mt-5 mb-5">Código EAN: <?php echo $articulo['ean']; ?></h4>
            <h5 class="card-text mt-2 mb-2 fw-bold">Categoría: <?php echo $articulo['categoria']; ?></h4>
                <h5 class="card-text mt-2 mb-2 fw-bold">Subcategoría: <?php echo $articulo['subcategoria']; ?></h5>

                <div class="row">
                    <div class="col-3 mt-5">
                        <h6 class="card-text text-decoration-none fs-4">Tallas disponibles:</h6>
                        <ul class="list-inline">
                            <?php
                            $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            $conn = $conexionDB->obtenerConexion();

                            // Obtener la columna de tallas según la categoría y subcategoría del artículo
                            $talla_column = '';
                            if ($articulo['categoria'] == 'Hombre' && $articulo['subcategoria'] == 'Calzado') {
                                $talla_column = 'talla_hom_zap';
                            } elseif ($articulo['categoria'] == 'Mujer' && $articulo['subcategoria'] == 'Calzado') {
                                $talla_column = 'talla_muj_zap';
                            } elseif ($articulo['categoria'] == 'Niño' && $articulo['subcategoria'] == 'Calzado') {
                                $talla_column = 'talla_nin_zap';
                            } elseif ($articulo['categoria'] == 'Hombre' && $articulo['subcategoria'] == 'Ropa') {
                                $talla_column = 'talla_hom_rop';
                            } elseif ($articulo['categoria'] == 'Mujer' && $articulo['subcategoria'] == 'Ropa') {
                                $talla_column = 'talla_muj_rop';
                            } elseif ($articulo['categoria'] == 'Niño' && $articulo['subcategoria'] == 'Ropa') {
                                $talla_column = 'talla_nin_rop';
                            }

                            if (!empty($talla_column)) {
                              
                                $sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'articulos' AND COLUMN_NAME = '$talla_column'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                   
                                    $row = $result->fetch_assoc();
                                    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

                                    echo "<select name='$talla_column' class='form-select form-select-lg'>";
                                    foreach ($enumList as $value)
                                        echo "<option value='$value'>$value</option>";
                                    echo "</select>";
                                } else {
                                    echo "0 resultados para la columna $talla_column";
                                }
                            } else {
                                echo "No se encontró la columna de la talla para esta categoría y subcategoría.";
                            }

                            $conn->close();
                            ?>
                        </ul>
                    </div>
                </div>


                <div class="col-1 mb-5 fs-4 mt-5">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control fs-4" id="cantidad" name="cantidad" placeholder="0" required>
                </div>


                <div class="row">
                    <div class="col-5 ps-5">
                        <h6 class="card-text fs-1 text-primary fw-bold text-decoration-none"><?php echo $articulo['precio']; ?> €</h6>
                    </div>
                    <div class="col-5">
                        <?php if ($articulo['descuento']) : ?>
                            <h6 class="card-text fs-1 text-danger fw-bold text-decoration-none">Descuento - <?php echo  $articulo['descuento']; ?> %</h6>
                        <?php endif; ?>
                    </div>
                    <div class="col-2 text-end pe-5 pb-2">
                        <form action="index.php?page=comprarArticulo" method="post">
                            <input type="hidden" name="art_id" value="<?php echo $articulo['id_art']; ?>">
                            <button type="submit" class="btn btn-primary p-2" aria-label="Carrito de la Compra">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                                </svg>
                                <span class="visually-hidden">Carrito de la Compra</span>
                            </button>
                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>

<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous_page = $_SERVER['HTTP_REFERER'];
} else {
    
    $previous_page = "index.php";
}
?>

<div class="d-flex justify-content-center align-items-center p-3">
    <button onclick="window.location.href='<?php echo $previous_page; ?>'" class="btn btn-primary">Volver Atrás</button>
</div>