<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function validarDNI($dni)
{
    $dni = strtoupper($dni); 

    // Verifica que tenga 9 caracteres (8 dígitos + 1 letra)
    if (strlen($dni) != 9) {
        return false;
    }

    // Extrae los números del DNI
    $numeros = substr($dni, 0, 8);

    // Extrae la letra del DNI
    $letra = substr($dni, 8, 1);

    // Calcula la letra esperada
    $letraEsperada = substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1);

    // Compara la letra esperada con la letra del DNI
    if ($letra !== $letraEsperada) {
        return false;
    }

    return true;
}

function guardarDatosSesion($email, $rol)
{
    $_SESSION['email'] = $email;
    $_SESSION['rol'] = $rol;
  
}

function obtenerEmailYPasswordUsuario()
{
    $datosUsuario = array();
    if (isset($_SESSION['email'])) {
        $datosUsuario['email'] = $_SESSION['email'];
        
        if (isset($_SESSION['password'])) {
            $datosUsuario['password'] = $_SESSION['password'];
        }
    }
    
    echo "Datos de usuario obtenidos: ";
    var_dump($datosUsuario);
    return $datosUsuario;
}


function obtenerRolUsuario()
{
    if (isset($_SESSION['rol'])) {
        return $_SESSION['rol'];
    } else {
        return null;
    }
}

function obtenerDatosUsuarioPorEmail($email_usuario)
{
    
    include_once './php/ConexionDB.php';

    require_once 'config.php';
    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    $conn = $conexionDB->obtenerConexion();

    $sql = "SELECT * FROM usuarios WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 1) {
        
        $fila = $resultado->fetch_assoc();
        $datos_usuario = array(
            'nombre' => $fila["nombre"],
            'apellidos' => $fila["apellidos"],
            'dni' => $fila["dni"],
            'email' => $fila["email"]
        );
    } else {
        
        $datos_usuario = array();
    }

    $conn->close();

    return $datos_usuario;
}



function obtenerNombreUsuarioPorID($id_usuario) {

    include_once './php/ConexionDB.php';

    require_once 'config.php';

    $conexionDB = new ConexionDB(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $conn = $conexionDB->obtenerConexion();


       // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta SQL para obtener el nombre de usuario por ID
    $sql = "SELECT nombre FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró un resultado
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nombre'];
    } else {
        return "Invitado";
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}

function obtenerIDUsuario() {
    // Comprobar si el usuario ha iniciado sesión
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Devolver el ID del usuario que ha iniciado sesión
        return $_SESSION['id_usuario'];
    } else {
        // Devolver 'invitado' si no hay ningún usuario autenticado
        return 'invitado';
    }
}
