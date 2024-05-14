<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <?php

            if (isset($_SESSION['error_actualizacion'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_actualizacion'] . '</div>';
                unset($_SESSION['error_actualizacion']); // Limpiar la variable de sesión después de mostrar el error
            }
            if (isset($_SESSION['categoria_activada'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['categoria_activada'] . '</div>';
                unset($_SESSION['categoria_activada']); // Limpiar la variable de sesión después de mostrar el mensaje
            }
            if (isset($_SESSION['subcategoria_activada'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['subcategoria_activada'] . '</div>';
                unset($_SESSION['subcategoria_activada']); // Limpiar la variable de sesión después de mostrar el mensaje
            }
            ?>


            <div class="bg-danger text-white p-2 mb-2 text-center">
                <h3>Categorías Inactivas</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cod Categoría</th>
                            <th>Nombre Categoría</th>
                            <th>Cod Subcategoría</th>
                            <th>Nombre Subcategoría</th>
                            <th>ACTIVAR CATEGORIA</th>
                        </tr>
                    </thead>
                    <tbody>
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
                            echo '<td>';
                            echo '<form action="index.php?page=activarCategoria" method="POST">';
                            echo '<input type="hidden" name="cod_cat" value="' . $categoria['cod_cat'] . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . $categoria['nom_cat'] . '">';
                            echo '<input type="hidden" name="cod_sub" value="' . $categoria['cod_sub'] . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . $categoria['nom_sub'] . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="modificar">ACTIVAR</button>';
                            echo '</form>';
                            echo '</td>';
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
                                                <a class="page-link" href="<?php echo $_SERVER['REQUEST_URI'] . '&pagina=' . $pagina; ?>"><?php echo $pagina; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>



                    </tbody>
                    <div class="d-grid">
                    </div>
                </table>
                <div class="d-grid col-4 aling-center mx-auto">
                    <a href="index.php?page=productos" class="btn btn-secondary mt-2">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>