<?php
// Rutas de las páginas
$pages = array(
    'principal'=> '../index.php',
    'inicio' => 'principal.php',
    'tienda' => 'tienda.php',
    'somos' => 'quienes_somos.php',
    'contacto' => 'contacto.php',
    'registro' => 'registro.php',
    'loginAdmin' => 'loginAdmin.php',
    'loginCliente' => 'loginCliente.php',
    'loginEmpleado' => 'loginEmpleado.php',
    'miCuenta' => 'miCuenta.php',
    'cambiarPassword' => 'cambiarPassword.php',
    'recuperarPassword' => 'recuperarPassword.php',
    'bajaUsuario' => 'bajaUsuario.php',
    'usuarioBorrado' => 'usuarioBorrado.php',
    'registroCompletado' => 'registroCompletado.php',
    'misPedidos' => 'carrito/misPedidos.php',
    'listaDeseos' => 'carrito/listaDeseos.php',
    'articulos' => 'productos/articulos.php',
    'productos' => 'productos/productos.php',
    'categorias' => 'productos/categorias.php',
    'modificarCategorias' => 'productos/modificarCategorias.php',
    'borrarCategorias' => 'productos/borrarCategorias.php',
    'categoriasInactivas' => 'productos/categoriasInactivas.php',
    'activarCategoria' => 'productos/activarCategoria.php',
    'altaArticulo' => 'articulos/altaArticulo.php',
    'mantenimientoArticulo' => 'articulos/mantenimientoArticulo.php',
    'seleccionarCategoria' => 'articulos/seleccionarCategoria.php',
    'modificarArticulo' => 'articulos/modificarArticulo.php',
    'seleccionarCategoriaModificada' => 'articulos/seleccionarCategoriaModificada.php',
    'modificarCategoria' => 'articulos/modificarCategoria.php',
    'borrarArticulo' => 'articulos/borrarArticulo.php',
    'articulosInactivos' => 'articulos/articulosInactivos.php',
    'activarArticulo' => 'articulos/activarArticulo.php',
    'usuarios' => 'usuarios/usuarios.php',
    'mantenimientoClientes' => 'usuarios/mantenimientoClientes.php',
    'mantenimientoEmpleados' => 'usuarios/mantenimientoEmpleados.php',
    'mantenimientoAdministradores' => 'usuarios/mantenimientoAdministradores.php',
    'mantenimientoUsuarios' => 'usuarios/mantenimientoUsuarios.php',
    'modificarCliente' => 'usuarios/modificarCliente.php',
    'modificarEmpleado' => 'usuarios/modificarEmpleado.php',
    'modificarAdministrador' => 'usuarios/modificarAdministrador.php',
    'modificarUsuario' => 'usuarios/modificarUsuario.php',
    'borrarCliente' => 'usuarios/borrarCliente.php',
    'clientesInactivos' => 'usuarios/clientesInactivos.php',
    'activarCliente' => 'usuarios/activarCliente.php',
    'borrarEmpleado' => 'usuarios/borrarEmpleado.php',
    'empleadosInactivos' => 'usuarios/empleadosInactivos.php',
    'activarEmpleado' => 'usuarios/activarEmpleado.php',
    'administradoresInactivos' => 'usuarios/administradoresInactivos.php',
    'activarAdministrador' => 'usuarios/activarAdministrador.php',
    'borrarAdministrador' => 'usuarios/borrarAdministrador.php',
    'comprarArticulo' => 'comprarArticulo.php',
);

function handle_request()
{
    global $pages;

    // Obtener el valor de la página solicitada
    $page = isset($_GET['page']) ? $_GET['page'] : 'inicio';

    if (!ctype_alnum($page)) {
        
        $page = 'inicio';
    }

    if (array_key_exists($page, $pages)) {
        
        $page_path = __DIR__ . '/' . $pages[$page];

        // Directorio Carrito
        if ($page == 'misPedidos' || $page == 'listaDeseos') {
            $page_path = dirname(__DIR__) . '/' . $pages[$page];
        }

        // Directorio productos
        if ($page == 'articulos' || $page == 'productos' || $page == 'categorias' || $page == 'modificarCategorias' 
        || $page == 'borrarCategorias' || $page == 'categoriasInactivas' || $page == 'activarCategoria') {
            $page_path = dirname(__DIR__) . '/' . $pages[$page];
        }

        if ($page == 'altaArticulo' || $page == 'mantenimientoArticulo' || $page == 'seleccionarCategoria' || $page == 'modificarArticulo' || $page == 'modificarCategoria'
        || $page == 'seleccionarCategoriaModificada' || $page == 'borrarArticulo' || $page == 'articulosInactivos' || $page == 'activarArticulo' ) {
            $page_path = dirname(__DIR__) . '/' . $pages[$page];
        }

        if ($page == 'usuarios' || $page == 'mantenimientoUsuarios' || $page == 'mantenimientoClientes' || $page == 'mantenimientoEmpleados' 
        || $page == 'modificarUsuario' || $page == 'modificarCliente' || $page == 'modificarEmpleado' || $page == 'borrarCliente' || $page == 'clientesInactivos'
        || $page == 'activarCliente' || $page == 'borrarEmpleado' || $page == 'empleadosInactivos' || $page == 'activarEmpleado' || $page == 'mantenimientoAdministradores' 
        || $page == 'modificarAdministrador' || $page == 'borrarAdministrador' || $page == 'administradoresInactivos' || $page == 'activarAdministrador') {
            $page_path = dirname(__DIR__) . '/' . $pages[$page];
        }

        if ($page == 'comparArticulo') {
            $page_path = dirname(__DIR__) . '/' . $pages[$page];
        }
       
        include $page_path;
    } else {
        
        include __DIR__ . '/principal.php';
    }
}
