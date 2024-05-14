<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;

unset($_SESSION['nom_cat']);
unset($_SESSION['nom_sub']);
$nom_cat = "";
$nom_sub = "";

?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <h3>Seleccionar Categorías</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cod Categoría</th>
                            <th>Nombre Categoría</th>
                            <th>Cod Subcategoría</th>
                            <th>Nombre Subcategoría</th>
                            <th>SELECCIONAR</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        include './articulos/consulta_categoria2.php';
                        
                        $registros_por_paginaAS = 10;

                        $total_categorias = count($categorias);

                        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                        $indice_inicio = ($pagina_actual - 1) * $registros_por_paginaAS;
                        $indice_fin = min($indice_inicio + $registros_por_paginaAS, $total_categorias);

                        for ($i = $indice_inicio; $i < $indice_fin; $i++) {
                            $categoria = $categorias[$i];
                            echo '<tr>';
                            echo '<td>' . $categoria['cod_cat'] . '</td>';
                            echo '<td>' . $categoria['nom_cat'] . '</td>';
                            echo '<td>' . $categoria['cod_sub'] . '</td>';
                            echo '<td>' . $categoria['nom_sub'] . '</td>';
                            echo '<td>';
                            echo '<form action="index.php?page=altaArticulo" method="POST">';
                            echo '<input type="hidden" name="cod_cat" value="' . $categoria['cod_cat'] . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . $categoria['nom_cat'] . '">';
                            echo '<input type="hidden" name="cod_sub" value="' . $categoria['cod_sub'] . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . $categoria['nom_sub'] . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="seleccionar">SELECCIONAR</button>';
                            echo '</form>';
                            echo '</td>';

                            $_SESSION['nom_cat'] = $categoria['nom_cat'];
                            $_SESSION['nom_sub'] = $categoria['nom_sub'];
                        }

                        $total_paginasAS = ceil($total_categorias / $registros_por_paginaAS);
                        ?>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-3">
                            <a href="index.php?page=altaArticulo" class="btn btn-secondary">Cancelar</a>
                        </div>

                        <tr>
                            <td colspan="7">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php for ($pagina = 1; $pagina <= $total_paginasAS; $pagina++) : ?>
                                            <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?page=seleccionarCategoria&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
