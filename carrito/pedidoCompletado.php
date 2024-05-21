<?php
include './pagina/breadcrumb.php';
echo $breadcrumbs;


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

if (isset($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];

    
    $sql_actualizar_estado = "UPDATE pedidos SET estado = 'COMPLETADO' WHERE id = ?";
    $stmt_actualizar_estado = $conn->prepare($sql_actualizar_estado);
    $stmt_actualizar_estado->bind_param("i", $id_pedido);
    
    if ($stmt_actualizar_estado->execute()) {
        echo '<div class="alert alert-success" role="alert">El estado del pedido se actualizó correctamente a COMPLETADO.</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al actualizar el estado del pedido: ' . $conn->error . '</div>';
    }

    $stmt_actualizar_estado->close();
}

$conn->close();
?>

<div class="col">
    <form action="index.php?page=pedidosClientesIncompletos" method="POST">
        <button type="submit" class="btn btn-primary">Volver</button>
    </form>
</div>


