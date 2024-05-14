<?php


function manejar_roles()
{
    // Manejar la solicitud de inicio de sesión del cliente
    if (isset($_GET['page']) && $_GET['page'] === 'loginCliente') {
        // Establecer el rol del usuario como cliente en la sesión
        $_SESSION['rol'] = 'cliente';

        // Redirigir de vuelta a la página principal
        header('Location: ./index.php?page=registroCompletado');
        exit();
    }

}
