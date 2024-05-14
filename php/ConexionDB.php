<?php

// Incluir el archivo de configuración
include_once 'config.php';

// CONEXIÓN CON LA BASE DE DATOS
class ConexionDB
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        
        $this->conexion->set_charset("utf8");
    }

    public function obtenerConexion()
    {
        return $this->conexion;
    }

    public function cerrarConexion()
    {
        $this->conexion->close();
    }
}

?>
