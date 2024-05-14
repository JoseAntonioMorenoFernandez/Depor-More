<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;
$ean = isset($_POST['ean']) ? $_POST['ean'] : '';

?>

<form action="index.php?page=mantenimientoArticulo" method="POST">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="ordenar">Ordenar por:</label>
            <select name="ordenar" class="form-select">
                <option value="categoria">Categoría</option>
                <option value="subcategoria">Subcategoría</option>
                <option value="ean">EAN</option>
                <option value="nombre">Nombre</option>
                <option value="precio">Precio</option>
                <option value="descuento">Descuento</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="tipo">Tipo:</label>
            <select name="tipo" class="form-select">
                <option value="asc">Ascendente</option>
                <option value="desc">Descendente</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="buscar">Buscar:</label>
            <input type="text" name="buscar" class="form-control">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary mt-4">Aplicar filtros</button>
        </div>
    </div>
</form>


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <h3>Administrar Artículos</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>EAN</th>
                            <th>Nombre</th>
                            <th style="display: none;">Descripción</th>
                            <th>Categoría</th>
                            <th>Subcategoría</th>
                            <th>Precio</th>
                            <th>Imagen 1</th>
                            <th>Imagen 2</th>
                            <th>Decuento</th>
                            <th>MODIFICAR</th>
                            <th>CAMBIAR</th>
                            <th>BORRAR</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Incluir el archivo de consulta de categorías
                        include 'consulta_articulo.php';

                        $registros_por_pagina = 10;

                        $total_articulos = count($articulos);

                        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                        $indice_inicio = ($pagina_actual - 1) * $registros_por_pagina;
                        $indice_fin = min($indice_inicio + $registros_por_pagina, $total_articulos);

                        for ($i = $indice_inicio; $i < $indice_fin; $i++) {
                            $articulo = $articulos[$i];
                            echo '<tr>';
                            echo '<td>' . $articulo['ean'] . '</td>';
                            echo '<td>' . $articulo['nombre'] . '</td>';
                            echo '<td style="display: none;">' . $articulo['descripcion'] . '</td>';
                            echo '<td>' . $articulo['categoria'] . '</td>';
                            echo '<td>' . $articulo['subcategoria'] . '</td>';
                            echo '<td>' . $articulo['precio'] . '</td>';
                            echo '<td><img src="ruta_imagenes/' . $articulo['imagen1'] . '" alt="Imagen 1" style="width: 80px;"></td>';
                            if (!empty($articulo['imagen2'])) {
                                echo '<td><img src="ruta_imagenes/' . $articulo['imagen2'] . '" alt="Imagen 2" style="width: 80px;"></td>';
                            } else {

                                echo '<td></td>';
                            }
                            echo '<td>' . $articulo['descuento'] . '</td>';

                            echo '<td>';
                            echo '<form action="index.php?page=modificarArticulo" method="POST">';
                            // Campos ocultos para pasar los datos del artículo
                            echo '<input type="hidden" name="ean" value="' . htmlspecialchars($articulo['ean']) . '">';
                            echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($articulo['nombre']) . '">';
                            echo '<input type="hidden" name="descripcion" value="' . htmlspecialchars($articulo['descripcion']) . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . htmlspecialchars($articulo['categoria']) . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . htmlspecialchars($articulo['subcategoria']) . '">';
                            echo '<input type="hidden" name="precio" value="' . htmlspecialchars($articulo['precio']) . '">';
                            echo '<input type="hidden" name="imagen1" value="' . htmlspecialchars($articulo['imagen1']) . '">';
                            echo '<input type="hidden" name="imagen2" value="' . htmlspecialchars($articulo['imagen2']) . '">';
                            echo '<input type="hidden" name="descuento" value="' . htmlspecialchars($articulo['descuento']) . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="modificar">MODIFICAR</button>';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="index.php?page=modificarCategoria" method="POST">';
                            // Campos ocultos para pasar los datos del artículo
                            echo '<input type="hidden" name="ean" value="' . htmlspecialchars($articulo['ean']) . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . htmlspecialchars($articulo['categoria']) . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . htmlspecialchars($articulo['subcategoria']) . '">';

                            echo '<button type="submit" class="btn btn-info btn-sm" name="categoria">CATEGORIA</button>';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="index.php?page=borrarArticulo" method="POST">';
                            echo '<input type="hidden" name="ean" value="' . htmlspecialchars($articulo['ean']) . '">';
                            echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($articulo['nombre']) . '">';
                            echo '<input type="hidden" name="descripcion" value="' . htmlspecialchars($articulo['descripcion']) . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . htmlspecialchars($articulo['categoria']) . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . htmlspecialchars($articulo['subcategoria']) . '">';
                            echo '<input type="hidden" name="precio" value="' . htmlspecialchars($articulo['precio']) . '">';
                            echo '<input type="hidden" name="imagen1" value="' . htmlspecialchars($articulo['imagen1']) . '">';
                            echo '<input type="hidden" name="imagen2" value="' . htmlspecialchars($articulo['imagen2']) . '">';
                            echo '<input type="hidden" name="descuento" value="' . htmlspecialchars($articulo['descuento']) . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm" name="borrar">BORRAR</button>';
                            echo '</form>';
                            echo '</td>';
                        }

                        $total_paginas = ceil($total_articulos / $registros_por_pagina);
                        ?>

                        <tr>
                            <td colspan="12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php for ($pagina = 1; $pagina <= $total_paginas; $pagina++) : ?>
                                            <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?page=mantenimientoArticulo&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-1">
                    <a href="index.php?page=productos" class="btn btn-secondary">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
</div>