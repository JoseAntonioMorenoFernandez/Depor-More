<?php
include_once './pagina/breadcrumb.php';
include_once './php/funciones_usuario.php';

// Verificar si la sesión está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo $breadcrumbs;

// Obtener el ID del usuario actual
$id_usuario = obteneridUsuario();

// Inicializar el carrito de usuario
function inicializarCarritoUsuario($id_usuario)
{
    $_SESSION['usuarios'][$id_usuario]['carrito'] = array();
}

// Iniciar carrito si no está iniciado
if (!isset($_SESSION['usuarios'][$id_usuario]['carrito'])) {
    inicializarCarritoUsuario($id_usuario);
}

// Agregar un producto al carrito de usuario
function agregarAlCarritoUsuario($id_usuario, $producto)
{
    if (!isset($_SESSION['usuarios'][$id_usuario]['carrito'])) {
        inicializarCarritoUsuario($id_usuario);
    }
    $_SESSION['usuarios'][$id_usuario]['carrito'][] = $producto;
}

// Eliminar un producto del carrito de usuario
function eliminarDelCarritoUsuario($id_usuario, $indice)
{
    unset($_SESSION['usuarios'][$id_usuario]['carrito'][$indice]);
}

// Mostrar el carrito del usuario
function mostrarCarritoUsuario($id_usuario)
{
    $totalCompra = 0;
    if (empty($_SESSION['usuarios'][$id_usuario]['carrito'])) {
        echo "El carrito está vacío.";
    } else {
        foreach ($_SESSION['usuarios'][$id_usuario]['carrito'] as $indice => $producto) {
            echo "<tr class='text-center'>";
            echo "<td class='col-2'>" . htmlspecialchars($producto['ean']) . "</td>";
            echo "<td class='col-3'>" . htmlspecialchars($producto['nombre']) . "</td>";
            echo "<td class='col-1'>" . htmlspecialchars($producto['talla']) . "</td>";
            echo "<td class='col-2'>";
            echo "<form action='index.php?page=carrito' method='post' class='d-inline-flex'>";
            echo "<input class='form-control form-control-sm me-2' type='number' name='nueva_cantidad' value='" . htmlspecialchars($producto['cantidad']) . "' min='1'>";
            echo "<input type='hidden' name='indice' value='" . $indice . "'>";
            echo "<button type='submit' name='actualizar_cantidad' class='btn btn-primary btn-sm'>";
            echo "Actualizar";
            echo "</button>";
            echo "</form>";
            echo "</td>";
            echo "<td class='col-1'>" . number_format($producto['precio'], 2) . " €</td>";
            echo "<td class='col-1'>" . ($producto['descuento'] != 0 ? '- ' . number_format($producto['descuento']) . ' %' : '') . "</td>";
            $precioDescuento = $producto['precio'] - ($producto['precio'] * $producto['descuento'] / 100);
            echo "<td class='col-1'>" . number_format($precioDescuento, 2) . " €</td>";
            $subtotal = $precioDescuento * $producto['cantidad'];
            echo "<td class='col-1'>" . number_format($subtotal, 2) . " €</td>";
            echo "<td class='col-1'><form action='index.php?page=carrito' method='post'>";
            echo "<input type='hidden' name='indice' value='" . $indice . "'>";
            echo "<button type='submit' name='borrar' class='btn btn-danger btn-sm'>Eliminar</button>";
            echo "</form></td>";
            echo "</tr>";
            $totalCompra += $subtotal;
        }
        echo "<tr>";
        echo "<td colspan='7' class='text-end fs-5'><strong>Total:</strong></td>";
        echo "<td colspan='2' class='ps-3 fs-5'>" . number_format($totalCompra, 2) . " €</td>";
        echo "</tr>";
    }
}

// Si se envía un formulario para agregar un producto al carrito
if (isset($_POST['ean'], $_POST['nombre'], $_POST['precio'], $_POST['cantidad'])) {
    $producto = array(
        'ean' => $_POST['ean'],
        'nombre' => $_POST['nombre'],
        'precio' => $_POST['precio'],
        'cantidad' => $_POST['cantidad'],
        'descuento' => isset($_POST['descuento']) ? $_POST['descuento'] : 0,
        'talla' => isset($_POST['talla']) ? $_POST['talla'] : ''
    );
    // Agregar el producto al carrito del usuario
    agregarAlCarritoUsuario($id_usuario, $producto);
}

// Formulario para eliminar un producto del carrito
if (isset($_POST['borrar'], $_POST['indice'])) {
    eliminarDelCarritoUsuario($id_usuario, $_POST['indice']);
}

// Formulario para actualizar la cantidad de un producto en el carrito
if (isset($_POST['actualizar_cantidad'], $_POST['indice'], $_POST['nueva_cantidad'])) {
    $nueva_cantidad = $_POST['nueva_cantidad'];
    if ($nueva_cantidad > 0) {
        $_SESSION['usuarios'][$id_usuario]['carrito'][$_POST['indice']]['cantidad'] = $nueva_cantidad;
    } else {
        // Si la nueva cantidad es menor o igual a cero
        eliminarDelCarritoUsuario($id_usuario, $_POST['indice']);
    }
}
?>

<div class="container mt-5">
    <div class="bg-primary text-white p-2 mb-2 text-center">
        <h3>Carro de la compra</h3>
        <?php
        $nombre_usuario = obtenerNombreUsuarioPorID($id_usuario);
        echo $nombre_usuario ? "<p>Bienvenido, $nombre_usuario</p>" : "<p>Invitado</p>";
        ?>
    </div>

    <div class="table-responsive mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>EAN</th>
                    <th>Artículo</th>
                    <th>Talla</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Importe</th>
                    <th>Total</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php mostrarCarritoUsuario($id_usuario); ?>
            </tbody>
        </table>
    </div>
    <div class="row mt-4">
        <div class="col">
            <form action="index.php?page=inicio" method="POST">
                <button type="submit" class="btn btn-primary">Seguir Comprando</button>
            </form>
        </div>
        <div class="col text-end">
            <form action="index.php?page=procesarCompra" method="POST">
                <button type="submit" class="btn btn-success">Procesar Compra</button>
            </form>
        </div>
    </div>
</div>

