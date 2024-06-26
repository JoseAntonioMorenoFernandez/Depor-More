<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;

include_once './php/funciones_usuario.php';
include_once './php/ConexionDB.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;

require_once './php/config.php';
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

if (!$email_usuario) {
    echo "Debe iniciar sesión para ver sus pedidos.";
    exit();
}

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc();
    $dni = $usuario['dni'];
} else {
    echo "Usuario no encontrado.";
    exit();
}

$stmt->close();

$sql_pedidos = "SELECT * FROM pedidos WHERE dni = ? ORDER BY fecha DESC";
$stmt_pedidos = $conn->prepare($sql_pedidos);
$stmt_pedidos->bind_param("s", $dni);
$stmt_pedidos->execute();
$resultado_pedidos = $stmt_pedidos->get_result();
?>


<div class="container mt-5">
    <h1>Mis Pedidos</h1>
    <?php if ($resultado_pedidos->num_rows > 0) : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Total</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pedido = $resultado_pedidos->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($pedido['id']); ?></th>
                        <td><?php echo htmlspecialchars($pedido['fecha']); ?></td>
                        <td><?php echo htmlspecialchars(number_format($pedido['total'], 2)); ?> €</td>
                        <td><?php echo htmlspecialchars($pedido['estado']); ?></td>
                        <td>
                            <a href="index.php?page=detallePedido&id_pedido=<?php echo htmlspecialchars($pedido['id']); ?>" class="btn btn-info btn-sm">
                                Ver Detalle
                            </a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No tiene pedidos realizados.</p>
    <?php endif; ?>
</div>

<?php
$stmt_pedidos->close();
$conn->close();
?>