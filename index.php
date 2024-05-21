<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


include './php/manejo_roles.php';
manejar_roles();


// Mostrar el mensaje si está presente
if (isset($_SESSION['mensaje'])) {
    echo "<h1>" . $_SESSION['mensaje'] . "</h1>";
    // Eliminar el mensaje después de mostrarlo
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="sidebars.css">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <title>Depor More</title>
</head>

<body>
    <?php include('./php/ConexionDB.php'); ?>

    <?php include './pagina/cabecera.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Lateral izquierdo -->
            <div class="col-lg-2 col-md-12 col-sm-12">
                <?php include './pagina/lateral_izq.php'; ?>
            </div>

            <!-- Contenido principal -->
            <div class="col-lg-8 col-md-12 col-sm-12">
                <?php
                // Obtener el valor de la página solicitada
                $page = isset($_GET['page']) ? $_GET['page'] : 'inicio';

                // Verificar si la página solicitada está en la lista de páginas que requieren presentación
                $pages_con_presentacion = array('inicio', 'tienda', 'somos', 'contacto');
                if (in_array($page, $pages_con_presentacion)) {
                    include './pagina/presentacion.php';
                }

                // Incluir el manejador de solicitud
                include './pagina/ruta.php';
                handle_request();
                ?>
            </div>

            <!-- Lateral derecho -->
            <div class="col-lg-2 col-md-12 col-sm-12">
                <?php
                // Verificar el rol del usuario y mostrar el menú lateral correspondiente
                if (isset($_SESSION['rol'])) {
                    switch ($_SESSION['rol']) {
                        case 'cliente':
                            include './pagina/loginCliente.php'; // Mostrar contenido del lateral derecho para clientes
                            break;
                        case 'empleado':
                            include './pagina/loginEmpleado.php'; // Mostrar contenido del lateral derecho para empleados
                            break;
                        case 'administrador':
                            include './pagina/loginAdmin.php'; // Mostrar contenido del lateral derecho para administradores
                            break;
                        default:
                            include './pagina/lateral_der.php'; // Si no se encuentra un rol válido, mostrar el lateral derecho por defecto
                            break;
                    }
                } else {
                    include './pagina/lateral_der.php'; // Mostrar el lateral derecho por defecto si el usuario no ha iniciado sesión
                }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <?php include './pagina/footer.php'; ?>
    </footer>

    <!-- Scripts de Bootstrap y jQuery (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://sidebars.js"></script>
</body>

</html>