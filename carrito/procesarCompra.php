<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;

include_once './php/funciones_usuario.php';

$totalCompra = 0;

$id_usuario = obteneridUsuario();
$carrito_usuario = $_SESSION['usuarios'][$id_usuario]['carrito'];

if (empty($carrito_usuario)) {
    echo '<p class = "fw-bod fs-4">El carrito está vacío.</p>';
    echo "<br>";
    echo '<a href="index.php?page=carrito" class="btn btn-primary mt-5">Volver</a>';
    
} else {
    
?>

<div class="bg-primary text-white pt-2 text-center">
    <h3>Detalles de la compra</h3>
</div>
<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">EAN</th>
                    <th scope="col">Artículo</th>
                    <th scope="col">Talla</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Descuento (%)</th>
                    <th scope="col">Importe</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrito_usuario as $producto) : ?>
                    <?php
                    // Calcular el subtotal del producto
                    $precioDescuento = $producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100);
                    $subtotal = $producto['precio'] * $producto['cantidad'] * (1 - $producto['descuento'] / 100);
                    // Sumar el subtotal al total de la compra
                    $totalCompra += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $producto['ean']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['talla']; ?></td>
                        <td><?php echo $producto['cantidad']; ?></td>
                        <td><?php echo number_format($producto['precio'], 2); ?> €</td>
                        <td><?php echo $producto['descuento']; ?></td>
                        <td><?php echo number_format($precioDescuento, 2); ?> €</td>
                        <td><?php echo number_format($subtotal, 2); ?> €</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="7" class="text-end fw-bold">Total:</td>
                    <td class="fw-bold"><?php echo number_format($totalCompra, 2); ?> €</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container mt-5">
    <div class="bg-primary text-white p-2 mb-2 text-center">
        <h3>Procesar Compra</h3>
    </div>

    <?php
    // Obtener el nombre de usuario utilizando el ID de usuario
    $nombre_usuario = obtenerNombreUsuarioPorID($id_usuario);

    
    if ($nombre_usuario !== "Invitado") {
        
        echo "<p>Usuario:<b> $nombre_usuario.</b></p>";
        echo "<p>Pulse finalizar compra para realizar el pedido.</p>";
    } else {
        
        echo "<p>Usuario:<b> $nombre_usuario.</b></p>";
        echo "<p>Pulse finalizar compra para realizar el pedido..</p>";
    }
    ?>
</div>





<div class="row mt-4">
    <div class="col">
        <a href="index.php?page=carrito" class="btn btn-primary">Cancelar</a>
    </div>
    <div class="col text-end">
        <a href="index.php?page=finalizarCompra" class="btn btn-success">Finalizar Compra</a>
    </div>
</div>
 <?php

}

?>