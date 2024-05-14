<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs; ?>
<?php
$cod_cat = $_POST['cod_cat'];
$nom_cat = $_POST['nom_cat'];
$cod_sub = $_POST['cod_sub'];
$nom_sub = $_POST['nom_sub'];

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3 class="mb-4 text-center border p-3 bg-primary text-white">Modificar Categorías</h3>
            <form action="./productos/modificar_cat.php" method="POST">
                <input type="hidden" name="cod_cat" value="<?php echo $cod_cat; ?>">
                <input type="hidden" name="nom_cat" value="<?php echo $nom_cat; ?>">
                <input type="hidden" name="cod_sub" value="<?php echo $cod_sub; ?>">
                <input type="hidden" name="nom_sub" value="<?php echo $nom_sub; ?>">

                <div class="mb-3">
                    <label for="cod_cat" class="form-label">Código de Categoría:</label>
                    <input type="text" id="cod_cat" name="cod_cat" value="<?php echo $cod_cat; ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="nom_cat" class="form-label">Nombre de Categoría:</label>
                    <input type="text" id="nom_cat" name="nom_cat" value="<?php echo $nom_cat; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cod_sub" class="form-label">Código de Subcategoría:</label>
                    <input type="text" id="cod_sub" name="cod_sub" value="<?php echo $cod_sub; ?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="nom_sub" class="form-label">Nombre de Subcategoría:</label>
                    <input type="text" id="nom_sub" name="nom_sub" value="<?php echo $nom_sub; ?>" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <a href="index.php?page=categorias" class="btn btn-secondary mt-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
