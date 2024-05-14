<?php

include 'categorias_inactivas.php';


$registros_por_pagina = 10;


$total_categorias = count($categorias);


$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;


$indice_inicio = ($pagina_actual - 1) * $registros_por_pagina;
$indice_fin = min($indice_inicio + $registros_por_pagina, $total_categorias);


for ($i = $indice_inicio; $i < $indice_fin; $i++) {
    $categoria = $categorias[$i];
    echo '<tr>';
    echo '<td>' . $categoria['cod_cat'] . '</td>';
    echo '<td>' . $categoria['nom_cat'] . '</td>';
    echo '<td>' . $categoria['cod_sub'] . '</td>';
    echo '<td>' . $categoria['nom_sub'] . '</td>';
    echo '<td><button class="btn btn-primary btn-sm">ACTIVAR</button></td>';
    echo '</tr>';
}

$total_paginas = ceil($total_categorias / $registros_por_pagina);
?>

<tr>
    <td colspan="7">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php for ($pagina = 1; $pagina <= $total_paginas; $pagina++) : ?>
                    <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                        <a class="page-link" href="index.php?page=admin_categorias&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>

    </td>
</tr>