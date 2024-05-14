<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;

include 'articulos_principal.php';


if ($categoriaSeleccionada && $subcategoriaSeleccionada) {
  
    $articulosCategoria = obtenerArticulosPorCategoria($categoriaSeleccionada, $subcategoriaSeleccionada);

    $articulosPagina = $articulosCategoria;
} else {
    
    $articulosPagina = $articulos;
}


$articulosPorPagina = 9;


$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;


$totalPaginas = ceil(count($articulosPagina) / $articulosPorPagina);


$indiceInicio = ($paginaActual - 1) * $articulosPorPagina;
$indiceFin = $indiceInicio + $articulosPorPagina;


$articulosPagina = array_slice($articulosPagina, $indiceInicio, $articulosPorPagina);


$page = isset($_GET['page']) ? $_GET['page'] : '';

?>


<div class="row">
    <?php foreach ($articulosPagina as $articulo) : ?>

        <div class="col-lg-4 col-md-6 col-sm-12 mt-1 mb-1">
            <div class="card h-100 overflow-hidden">

                <div class="imagen-container">
                    <img class="imagen1" src="ruta_imagenes/<?php echo $articulo['imagen1']; ?>" alt="Imagen 1">
                    <img class="imagen2" src="ruta_imagenes/<?php echo $articulo['imagen2']; ?>" alt="Imagen 2">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><?php echo $articulo['nombre']; ?></h5>
                    <p class="card-text"><?php echo $articulo['descripcion']; ?></p>
                    <div class="row mt-auto">
                        <div class="col-5 mt-5">
                            <h6 class="card-text fs-3 text-primary fw-bold text-decoration-none"><?php echo $articulo['precio']; ?> €</h6>
                        </div>
                        <div class="col-5 mt-5">
                            <?php if ($articulo['descuento']) : ?>
                                <h6 class="card-text fs-2 text-danger fw-bold text-decoration-none"> - <?php echo  $articulo['descuento']; ?> %</h6>
                            <?php endif; ?>
                        </div>
                        <div class="col-2 text-end mt-4 ">
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

    <?php endforeach; ?>
</div>

<?php

?>
<div class="container-fluid">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if ($paginaActual > 1) : ?>
                <li class="page-item"><a class="page-link" href="<?php echo obtenerURLPaginaActual(); ?>&pagina=<?php echo $paginaActual - 1; ?>">Anterior</a></li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>"><a class="page-link" href="<?php echo obtenerURLPaginaActual(); ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>
            <?php if ($paginaActual < $totalPaginas) : ?>
                <li class="page-item"><a class="page-link" href="<?php echo obtenerURLPaginaActual(); ?>&pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<?php

function obtenerURLPaginaActual()
{
    $paginaURL = strtok($_SERVER["REQUEST_URI"], '?');
    return $paginaURL . (isset($_GET) && !empty($_GET) ? '?' . http_build_query($_GET) : '');
}
?>