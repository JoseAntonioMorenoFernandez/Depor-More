<?php


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
