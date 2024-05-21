<?php
session_start();

include 'ConexionDB.php'; 

include_once '../php/funciones_usuario.php';

// Si el usuario no está autenticado, asignar un ID de invitado
$id_usuario = $_SESSION['id_usuario'] = obtenerIDUsuario() ?? 'invitado';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $conexionDB = new ConexionDB($host, $usuario, $password, $base_datos);
        $conn = $conexionDB->obtenerConexion();

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            if ($row['activo'] == 'S') {
                
                if (password_verify($password, $row['password'])) {
                    
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['id_usuario'] = $row['id']; // Almacenar el ID del usuario en la sesión
                    $_SESSION['nombre_usuario'] = $row['nombre'];
                    $_SESSION['rol'] = $row['rol']; // Almacenar el rol en la sesión

                    // Verificar y transferir los datos del carrito del usuario
                    if (isset($_SESSION['usuarios'][$id_usuario]['carrito'])) {
                        // Copiar los datos del carrito del usuario al iniciar sesión
                        $_SESSION['usuarios'][$row['id']]['carrito'] = $_SESSION['usuarios'][$id_usuario]['carrito'];
                        // Limpiar los datos del carrito del usuario anterior
                        unset($_SESSION['usuarios'][$id_usuario]['carrito']);
                    }

                    // Imprimir los datos del carrito de la compra
                    echo "<pre>";
                    var_dump($_SESSION['usuarios'][$row['id']]['carrito']);
                    echo "</pre>";

                    header('Location: ../index.php?page=inicio');
                    exit();
                } else {
                    
                    $_SESSION['error_message'] = 'Contraseña incorrecta.';
                }
            } else {
                
                $_SESSION['error_message'] = 'Tu cuenta está desactivada. Por favor, ponte en contacto con el soporte.';
            }
        } else {
            
            $_SESSION['error_message'] = 'El usuario no existe.';
        }
    } else {
        
        $_SESSION['error_message'] = 'Por favor, introduce un correo electrónico y una contraseña.';
    }
}

header('Location: ../index.php?page=inicio');
exit();

?>
