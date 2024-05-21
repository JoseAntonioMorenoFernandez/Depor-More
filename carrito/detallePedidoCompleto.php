<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;


include_once './php/ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once './php/config.php';
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

if (!isset($_GET['id_pedido'])) {
    echo "No se ha especificado ningún pedido.";
    exit();
}

$id_pedido = $_GET['id_pedido'];

$sql_detalle = "SELECT lp.*, p.fecha, p.total, p.estado, a.nombre AS nombre_producto
                FROM lineapedido lp
                JOIN pedidos p ON lp.numPedido = p.id
                JOIN articulos a ON lp.ean = a.ean
                WHERE lp.numPedido = ?";


$stmt_detalle = $conn->prepare($sql_detalle);
$stmt_detalle->bind_param("i", $id_pedido);
$stmt_detalle->execute();
$resultado_detalle = $stmt_detalle->get_result();

if ($resultado_detalle->num_rows == 0) {
    echo "No se encontraron detalles para este pedido.";
    exit();
}
?>

<div class="container mt-5">
    <h1>Detalle del Pedido #<?php echo htmlspecialchars($id_pedido); ?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">EAN</th>
                <th scope="col">Nombre</th>
                <th scope="col">Talla</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Descuento</th>

            </tr>
        </thead>
        <tbody>
            <?php while ($detalle = $resultado_detalle->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($detalle['ean']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['nombre_producto']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['talla']); ?></td>
                    <td><?php echo htmlspecialchars($detalle['cantidad']); ?></td>
                    <td><?php echo htmlspecialchars(number_format($detalle['precio'], 2)); ?> €</td>
                    <td><?php echo htmlspecialchars($detalle['descuento']); ?>%</td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<div class="col">
    <form action="index.php?page=pedidosClientesCompletos" method="POST">
        <button type="submit" class="btn btn-primary">Volver</button>
    </form>
</div>

<?php
$stmt_detalle->close();
$conn->close();
?>