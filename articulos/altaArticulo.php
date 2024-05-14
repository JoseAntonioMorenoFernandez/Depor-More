<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-primary text-white p-2 mb-2 text-center">
                <?php
                if (isset($_SESSION['articulo_agregado'])) {
                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['articulo_agregado'] . '</div>';
                    // Limpiar la variable de sesión 
                    unset($_SESSION['articulo_agregado']);
                    // Limpiar otras variables 
                    unset($_SESSION['ean']);
                    unset($_SESSION['nombre']);
                    unset($_SESSION['descripcion']);
                    unset($_SESSION['precio']);
                    unset($_SESSION['descuento']);
                    unset($_SESSION['imagen1']);
                    unset($_SESSION['imagen2']);
                    unset($_SESSION['categoria']);
                }

                if (isset($_SESSION['error_alta'])) {
                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_alta'] . '</div>';
                    
                    unset($_SESSION['error_alta']);
                }

                
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_cat'], $_POST['nom_sub'])) {
                    $nom_cat = $_POST['nom_cat'];
                    $nom_sub = $_POST['nom_sub'];
                } else {
                    
                    $nom_cat = "";
                    $nom_sub = "";
                }


                ?>

                <h3>Alta Artículo</h3>
            </div>
            <div class="bg-light p-3 rounded">
                <form action="./articulos/alta_articulo.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Seleccionar Categoría y Subcategoría:</label>
                        <a href="index.php?page=seleccionarCategoria" class="btn btn-secondary">SELECCIONAR</a>

                        <div class="row">
                            <div class="col-sm-6 mt-3">
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría:</label>
                                    <input type="hidden" name="nom_cat" value="<?php echo htmlspecialchars($nom_cat); ?>" readonly>
                                    <input type="text" id="categoria" name="categoria" value="<?php echo $nom_cat; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="mb-3">
                                    <label for="subcategoria" class="form-label">Subcategoría:</label>
                                    <input type="hidden" name="nom_sub" value="<?php echo htmlspecialchars($nom_sub); ?>" readonly>
                                    <input type="text" id="subcategoria" name="subcategoria" value="<?php echo $nom_sub; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ean" class="form-label">Código EAN:</label>
                        <input type="text" class="form-control" id="ean" name="ean" value="<?php echo isset($_SESSION['ean']) ? $_SESSION['ean'] : ''; ?>" pattern="[0-9]{13}" maxlength="13" placeholder="*EAN 13 dígitos" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Artículo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>" placeholder="*Nombre producto" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="*Descripción producto" required><?php echo isset($_SESSION['descripcion']) ? $_SESSION['descripcion'] : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" value="<?php echo isset($_SESSION['precio']) ? $_SESSION['precio'] : ''; ?>" placeholder="*PVP" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen1" class="form-label">Imagen 1:</label>
                        <input type="file" class="form-control" id="imagen1" name="imagen1" accept="image/jpeg, image/jpg, image/png, image/webp" value="<?php echo isset($_SESSION['imagen1']) ? $_SESSION['imagen1'] : ''; ?>" placeholder="*Añadir imagen" required>
                    </div>

                    <div class="mb-3">
                        <label for="imagen2" class="form-label">Imagen 2:</label>
                        <input type="file" class="form-control" id="imagen2" name="imagen2" accept="image/jpeg, image/jpg, image/png, image/webp" placeholder="Añadir imagen adicional">
                    </div>
                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento:</label>
                        <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo isset($_SESSION['descuento']) ? $_SESSION['descuento'] : ''; ?>" placeholder="Añadir descuento">
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