<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <?php
                // Mostrar mensaje de éxito si existe
                if (isset($_SESSION['categoria_agregada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['categoria_agregada'] . '</div>';
                    unset($_SESSION['categoria_agregada']); // Limpiar la variable de sesión después de mostrar el mensaje
                }
                // Mostrar errores si existen
                if (isset($_SESSION['error_categoria'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_categoria'] . '</div>';
                    unset($_SESSION['error_categoria']); 
                }
                if (isset($_SESSION['error_subcategoria'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_subcategoria'] . '</div>';
                    unset($_SESSION['error_subcategoria']); 
                }
                if (isset($_SESSION['categoria_agregada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['categoria_agregada'] . '</div>';
                    unset($_SESSION['categoria_agregada']); 
                }
                if (isset($_SESSION['categoria_actualizada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['categoria_actualizada'] . '</div>';
                    unset($_SESSION['categoria_actualizada']); 
                }
                if (isset($_SESSION['subcategoria_actualizada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['subcategoria_actualizada'] . '</div>';
                    unset($_SESSION['subcategoria_actualizada']); 
                }
                if (isset($_SESSION['error_actualizacion'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_actualizacion'] . '</div>';
                    unset($_SESSION['error_actualizacion']); 
                }
                if (isset($_SESSION['categoria_borrada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['categoria_borrada'] . '</div>';
                    unset($_SESSION['categoria_borrada']); 
                }
                if (isset($_SESSION['subcategoria_borrada'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['subcategoria_borrada'] . '</div>';
                    unset($_SESSION['subcategoria_borrada']); 
                }

                ?>

                <h3>Alta Categoría</h3>
            </div>
            <div class="bg-light p-3 rounded">

                <form action="./productos/alta_categoria.php" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="codigo_categoria" class="form-label">Cod. Categoría:</label>
                                <input type="text" id="codigo_categoria" name="codigo_categoria" class="form-control" placeholder="Tres caracteres">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="nombre_categoria" class="form-label">Nombre de Categoría:</label>
                                <input type="text" id="nombre_categoria" name="nombre_categoria" class="form-control" placeholder="Introduce los tres primeros caracteres">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="codigo_subcategoria" class="form-label">Cod. Subcategoría:</label>
                                <input type="text" id="codigo_subcategoria" name="codigo_subcategoria" class="form-control" placeholder="Tres caracteres">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="nombre_subcategoria" class="form-label">Nombre de Subcategoría:</label>
                                <input type="text" id="nombre_subcategoria" name="nombre_subcategoria" class="form-control" placeholder="Introduce los tres primeros caracteres">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <button type="submit" class="btn btn-primary me-md-2">Añadir</button>
                                <a href="index.php?page=productos" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <h3>Administrar Categorías</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cod Categoría</th>
                            <th>Nombre Categoría</th>
                            <th>Cod Subcategoría</th>
                            <th>Nombre Subcategoría</th>
                            <th>MODIFICAR</th>
                            <th>BORRAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        include 'consulta_categorias.php';

                        
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
                            echo '<form action="index.php?page=modificarCategorias" method="POST">';
                            echo '<input type="hidden" name="cod_cat" value="' . $categoria['cod_cat'] . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . $categoria['nom_cat'] . '">';
                            echo '<input type="hidden" name="cod_sub" value="' . $categoria['cod_sub'] . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . $categoria['nom_sub'] . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="modificar">MODIFICAR</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '<td>';
                            echo '<form action="index.php?page=borrarCategorias" method="POST">';
                            echo '<input type="hidden" name="cod_cat" value="' . $categoria['cod_cat'] . '">';
                            echo '<input type="hidden" name="nom_cat" value="' . $categoria['nom_cat'] . '">';
                            echo '<input type="hidden" name="cod_sub" value="' . $categoria['cod_sub'] . '">';
                            echo '<input type="hidden" name="nom_sub" value="' . $categoria['nom_sub'] . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm" name="modificar">BORRAR</button>';
                            echo '</form>';
                            echo '</td>';
                        }

                        
                        $total_paginas = ceil($total_categorias / $registros_por_pagina);
                        ?>

                        <tr>
                            <td colspan="7">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php for ($pagina = 1; $pagina <= $total_paginas; $pagina++) : ?>
                                            <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?page=categorias&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
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