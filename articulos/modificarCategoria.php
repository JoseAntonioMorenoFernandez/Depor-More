<?php
include './pagina/breadcrumb.php';
echo $breadcrumbs;

$nom_sub = isset($_POST['nom_sub']) ? $_POST['nom_sub'] : '';

$ean = isset($_POST['ean']) ? $_POST['ean'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_cat'], $_POST['nom_sub'])) {

    $_SESSION['nom_cat'] = $_POST['nom_cat'];
    $_SESSION['nom_sub'] = $_POST['nom_sub'];
}


$categoria = $_POST['nom_cat'];
$subcategoria = isset($_SESSION['nom_sub']) ? $_SESSION['nom_sub'] : '';

?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light p-3 rounded">
                <form action="./articulos/modificar_categoria.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ean" value="<?php echo htmlspecialchars($ean); ?>">

                    <div class="bg-primary text-white p-2 mb-2 text-center">
                        <h3>Modificar Categoría</h3>
                    </div>

                    <div class="mb-3">


                        <div class="mb-3">
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoría:</label>
                                        <input type="text" id="categoria" name="categoria" value="<?php echo htmlspecialchars($categoria); ?>" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div class="mb-3">
                                        <label for="subcategoria" class="form-label">Subcategoría:</label>
                                        <input type="text" id="subcategoria" name="subcategoria" value="<?php echo htmlspecialchars($nom_sub); ?>" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="index.php?page=mantenimientoArticulo" class="btn btn-secondary mt-2">Cancelar</a>
                    </div>
                </form>

                <div class="col-sm-10 mt-3 text-center">
                    <form action="index.php?page=seleccionarCategoriaModificada" method="post">
                        <input type="hidden" name="ean" value="<?php echo htmlspecialchars($ean); ?>">
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Cambiar de Categoría y Subcategoría:</label>
                            <button type="submit" class="btn btn-secondary">SELECCIONAR</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>