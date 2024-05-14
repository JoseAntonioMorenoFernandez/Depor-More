<?php
include './pagina/breadcrumb.php';
echo $breadcrumbs;

$nom_sub = isset($_POST['nom_sub']) ? $_POST['nom_sub'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_cat'], $_POST['nom_sub'])) {
    // Recupera los datos del formulario 
    $_SESSION['nom_cat'] = $_POST['nom_cat'];
    $_SESSION['nom_sub'] = $_POST['nom_sub'];
}

$ean = $_POST['ean'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['nom_cat'];
$subcategoria = isset($_SESSION['nom_sub']) ? $_SESSION['nom_sub'] : '';
$precio = $_POST['precio'];
$imagen1 = $_POST['imagen1'];
$imagen2 = $_POST['imagen2'];
$descuento = $_POST['descuento'];

?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-light p-3 rounded">
                <form action="./articulos/modificar_articulo.php" method="post" enctype="multipart/form-data">
                    <div class="bg-primary text-white p-2 mb-2 text-center">
                        <h3>Modificar Artículos</h3>
                    </div>

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

                    <div class="mb-3">
                        <label for="ean" class="form-label">Código EAN:</label>
                        <input type="text" class="form-control" id="ean" name="ean" value="<?php echo isset($ean) ? htmlspecialchars($ean) : ''; ?>" pattern="[0-9]{13}" maxlength="13" placeholder="*EAN 13 dígitos" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Artículo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" placeholder="*Nombre producto" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="*Descripción producto" required><?php echo isset($descripcion) ? htmlspecialchars($descripcion) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" id="precio" name="precio" value="<?php echo isset($precio) ? htmlspecialchars($precio) : ''; ?>" placeholder="*PVP" required>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <img src="$ruta_imagen1/<?php echo htmlspecialchars($imagen1); ?>" alt="Imagen 1" style="width: 100px;">
                        </div>
                        <div class="col-md-9">
                            <label for="imagen1" class="form-label">Imagen 1:</label>
                            <input type="file" class="form-control" id="imagen1" name="imagen1" accept="image/jpeg, image/jpg, image/png, image/webp" placeholder="*Añadir imagen">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3">
                            <?php if (!empty($imagen2)) : ?>
                                <img src="$ruta_imagen2/<?php echo htmlspecialchars($imagen2); ?>" alt="Imagen 2" style="width: 100px;">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-9">
                            <label for="imagen2" class="form-label">Imagen 2:</label>
                            <input type="file" class="form-control" id="imagen2" name="imagen2" accept="image/jpeg, image/jpg, image/png, image/webp" placeholder="Añadir imagen adicional">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="descuento" class="form-label">Descuento:</label>
                        <input type="number" class="form-control" id="descuento" name="descuento" value="<?php echo isset($descuento) ? htmlspecialchars($descuento) : ''; ?>" placeholder="Añadir descuento">
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="index.php?page=mantenimientoArticulo" class="btn btn-secondary mt-2">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>