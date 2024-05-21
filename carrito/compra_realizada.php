<?php


include_once '../php/funciones_usuario.php';
include_once '../php/ConexionDB.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Recuperar el email del usuario
$email_usuario = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Obtener el ID del usuario
$id_usuario = obteneridUsuario();

// Recuperar el carrito del usuario desde la sesión
$carrito_usuario = isset($_SESSION['usuarios'][$id_usuario]['carrito']) ? $_SESSION['usuarios'][$id_usuario]['carrito'] : [];


require_once '../php/config.php';
$conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$conn = $conexionDB->obtenerConexion();

$is_user_registered = false;


if ($email_usuario) {
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $email_usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows == 1) {
            $is_user_registered = true;
            $fila = $resultado->fetch_assoc();
            $nombre = $fila["nombre"];
            $apellidos = $fila["apellidos"];
            $dni = $fila["dni"];
            $email = $fila["email"];
            $direccion = $fila["direccion"];
            $localidad = $fila["localidad"];
            $cpostal = $fila["cpostal"];
            $provincia = $fila["provincia"];
            $telefono = $fila["telefono"];
        } else {
            echo "No se encontró el usuario en la base de datos.";
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Calcular el total de la compra
$total_compra = 0;
foreach ($carrito_usuario as $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'] * (1 - $producto['descuento'] / 100);
    $total_compra += $subtotal;
}

// Obtener la fecha y hora actual
$fecha_pedido = date('Y-m-d H:i:s');

// Insertar el pedido principal en la tabla pedidos
$sql_insert_pedido = "INSERT INTO pedidos (fecha, total, estado, dni) VALUES (?, ?, 'INCOMPLETO', ?)";
$stmt_pedido = $conn->prepare($sql_insert_pedido);

if ($stmt_pedido) {
    $stmt_pedido->bind_param("sds", $fecha_pedido, $total_compra, $dni);
    $stmt_pedido->execute();

    // Obtener el ID del pedido recién insertado
    $id_pedido = $conn->insert_id;
    $stmt_pedido->close();

    // Insertar cada línea del carrito en la tabla lineapedido
    $sql_insert_lineapedido = "INSERT INTO lineapedido (numPedido, ean, cantidad, precio, descuento, talla) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_lineapedido = $conn->prepare($sql_insert_lineapedido);

    if ($stmt_lineapedido) {
        foreach ($carrito_usuario as $producto) {
            $ean = $producto['ean'];
            $cantidad = $producto['cantidad'];
            $precio = $producto['precio'];
            $descuento = isset($producto['descuento']) ? $producto['descuento'] : 0;
            $talla = isset($producto['talla']) ? $producto['talla'] : '';

            $stmt_lineapedido->bind_param("isidds", $id_pedido, $ean, $cantidad, $precio, $descuento, $talla);
            $stmt_lineapedido->execute();
        }
        $stmt_lineapedido->close();

        // Vaciar el carrito del cliente
        $_SESSION['usuarios'][$id_usuario]['carrito'] = [];

        
        header("Location: ../index.php?page=compraRealizada&id_pedido=$id_pedido");
        exit();
    } else {
        echo "Error en la preparación de la consulta para lineapedido: " . $conn->error;
    }
} else {
    echo "Error en la preparación de la consulta para pedidos: " . $conn->error;
}


$conn->close();

?>

