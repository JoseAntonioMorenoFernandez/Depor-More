<?php

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
    echo '<td style="max-width: 190px; overflow: hidden; text-overflow: ellipsis;">' . $articulo['descripcion'] . '</td>';
    echo '<td>' . $articulo['categoria'] . '</td>';
    echo '<td>' . $articulo['subcategoria'] . '</td>';
    echo '<td>' . $articulo['precio'] . '</td>';
    
    echo '<td><img src="../imagenes/articulos/' . $articulo['imagen1'] . '" alt="Imagen 1" style="width: 80px;"></td>';
    
    echo '<td>';
    if (!empty($articulo['imagen2'])) {
        echo '<img src="../imagenes/articulos/' . $articulo['imagen2'] . '" alt="Imagen 2" style="width: 80px;">';
    }
    echo '</td>';
    echo '<td>' . $articulo['descuento'] . '</td>';
    echo '<td><button class="btn btn-primary btn-sm">MODIFICAR</button></td>';
    echo '<td><button class="btn btn-danger btn-sm">BORRAR</button></td>';
    echo '</tr>';
}

$total_paginas = ceil($total_articulos / $registros_por_pagina);
?>

<tr>
    <td colspan="7">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($pagina = 1; $pagina <= $total_paginas; $pagina++) : ?>
                    <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?page=mantenimientoArticulos&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </td>
</tr>
