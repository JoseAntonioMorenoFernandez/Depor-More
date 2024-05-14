<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;
$dni = isset($_POST['dni']) ? $_POST['dni'] : '';

?>

<form action="index.php?page=mantenimientoUsuarios" method="POST">
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="ordenar">Ordenar por:</label>
            <select name="ordenar" class="form-select">
                <option value="dni">DNI</option>
                <option value="nombre">Nombre</option>
                <option value="apellidos">Apellidos</option>
                <option value="localidad">Localidad</option>
                <option value="provincia">Provincia</option>
                <option value="rol">Rol</option>
                <option value="activo">Activo</option>
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
                <h3>Administrar Usuarios</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <table class="table table-striped table-striped-custom">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Rol</th>
                            <th>Activo</th>
                            <th>MODIFICAR</th>
                            <th>CAMBIAR</th>
                            <th>BORRAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        include 'consulta_usuarios.php';

                      
                        $usuarios_por_pagina = 10;

                        
                        $total_usuarios = count($usuarios);

                        
                        $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

                       
                        $indice_inicio = ($pagina_actual - 1) * $usuarios_por_pagina;
                        $indice_fin = min($indice_inicio + $usuarios_por_pagina, $total_usuarios);

                       
                        for ($i = $indice_inicio; $i < $indice_fin; $i++) {
                            $usuario = $usuarios[$i];
                            
                            echo '<tr>';                            
                            echo '<td>' . $usuario['email'] . '</td>';
                            echo '<td>' . $usuario['dni'] . '</td>';
                            echo '<td>' . $usuario['nombre'] . '</td>';
                            echo '<td>' . $usuario['apellidos'] . '</td>';
                            echo '<td>' . $usuario['rol'] . '</td>';
                            echo '<td>' . $usuario['activo'] . '</td>';
                            echo '<td>';
                            echo '<form action="index.php?page=modificarUsuario" method="POST">';
                           
                            echo '<input type="hidden" name="email" value="' . htmlspecialchars($usuario['email']) . '">';
                            echo '<input type="hidden" name="dni" value="' . htmlspecialchars($usuario['dni']) . '">';
                            echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($usuario['nombre']) . '">';
                            echo '<input type="hidden" name="apellidos" value="' . htmlspecialchars($usuario['apellidos']) . '">';
                            echo '<input type="hidden" name="direccion" value="' . htmlspecialchars($usuario['direccion']) . '">';
                            echo '<input type="hidden" name="localidad" value="' . htmlspecialchars($usuario['localidad']) . '">';
                            echo '<input type="hidden" name="cpostal" value="' . htmlspecialchars($usuario['cpostal']) . '">';
                            echo '<input type="hidden" name="provincia" value="' . htmlspecialchars($usuario['provincia']) . '">';
                            echo '<input type="hidden" name="telefono" value="' . htmlspecialchars($usuario['telefono']) . '">';
                            echo '<input type="hidden" name="rol" value="' . htmlspecialchars($usuario['rol']) . '">';
                            echo '<input type="hidden" name="activo" value="' . htmlspecialchars($usuario['activo']) . '">';
                            echo '<button type="submit" class="btn btn-primary btn-sm" name="modificar">MODIFICAR</button>';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="index.php?page=modificarRol" method="POST">';
                           
                            echo '<input type="hidden" name="dni" value="' . htmlspecialchars($usuario['dni']) . '">';
                            echo '<input type="hidden" name="rol" value="' . htmlspecialchars($usuario['rol']) . '">';

                            echo '<button type="submit" class="btn btn-info btn-sm" name="rol">ROL</button>';
                            echo '</form>';
                            echo '</td>';

                            echo '<td>';
                            echo '<form action="index.php?page=borrarUsuario" method="POST">';
                            echo '<input type="hidden" name="email" value="' . htmlspecialchars($usuario['email']) . '">';
                            echo '<input type="hidden" name="dni" value="' . htmlspecialchars($usuario['dni']) . '">';
                            echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($usuario['nombre']) . '">';
                            echo '<input type="hidden" name="apellidos" value="' . htmlspecialchars($usuario['apellidos']) . '">';
                            echo '<input type="hidden" name="direccion" value="' . htmlspecialchars($usuario['direccion']) . '">';
                            echo '<input type="hidden" name="localidad" value="' . htmlspecialchars($usuario['localidad']) . '">';
                            echo '<input type="hidden" name="cpostal" value="' . htmlspecialchars($usuario['cpostal']) . '">';
                            echo '<input type="hidden" name="provincia" value="' . htmlspecialchars($usuario['provincia']) . '">';
                            echo '<input type="hidden" name="telefono" value="' . htmlspecialchars($usuario['telefono']) . '">';
                            echo '<input type="hidden" name="rol" value="' . htmlspecialchars($usuario['rol']) . '">';
                            echo '<input type="hidden" name="activo" value="' . htmlspecialchars($usuario['activo']) . '">';
                            echo '<button type="submit" class="btn btn-danger btn-sm" name="borrar">BORRAR</button>';
                            echo '</form>';
                            echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td colspan="7">';
                            echo '<hr>';
                            echo '</td>';
                            echo ' </tr>';


                        }

                      
                        $total_paginas = ceil($total_usuarios / $usuarios_por_pagina);
                        ?>

                        <tr>
                            <td colspan="12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <?php for ($pagina = 1; $pagina <= $total_paginas; $pagina++) : ?>
                                            <li class="page-item <?php echo ($pagina == $pagina_actual) ? 'active' : ''; ?>">
                                                <a class="page-link" href="index.php?page=mantenimientoUsuarios&pagina=<?php echo $pagina; ?>"><?php echo $pagina; ?></a>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>
                                </nav>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-center mb-1">
                    <a href="index.php?page=usuarios" class="btn btn-secondary">Cancelar</a>
                </div>

            </div>
        </div>
    </div>
</div>