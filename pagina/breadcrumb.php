<?php
// Archivo breadcrumb para el manejo de las direcciones
$pages = array(
    'inicio' => 'Inicio',
    'tienda' => 'Tienda',
    'somos' => 'Quiénes Somos',
    'contacto' => 'Contacto',
    'registro' => 'Registro',
    'loginCliente' => 'loginCliente',
    'loginEmpleado' => 'loginEmpleado',
    'loginAdmin' => 'loginAdmin.php',
    'miCuenta' => 'Mi Cuenta',
    'registroCompletado' => 'Registro completado',
    'cambiarPassword' => 'Cambiar contraseña',
    'recuperarPassword' => 'Cambiar contraseña',
    'bajaUsuario' => 'Eliminar cuenta de usuario',
    'usuarioBorrado' => 'Confirmar borrar usuario',
    'misPedidos' => 'Listado de pedidos',
    'listaDeseos' => 'Articulos lista deseos',
    'productos' => 'Productos',
    'articulos' => 'Acticulos',
    'categorias' => 'Categorias',
    'modificarCategorias' => 'Modificación Categoría',
    'borrarCategorias'=> 'Borrar Categorías',
    'categoriasInactivas' => 'Categorias Inactivas',
    'activarCategoria' => 'Activar Categoría',
    'altaArticulo' => 'Alta Artículo',
    'mantenimientoArticulo' => 'Mantenimiento Artículos',
    'seleccionarCategoria' => 'Seleccionar Categoria',
    'modificarArticulo' => 'Modificación de Artículo',
    'seleccionarCatgoriaModificada' => 'Modificación de Categoría',
    'modificarCategoria' => 'Modificacion de Categoría',
    'borrarArticulo' => 'Borrar Artículo',
    'articulosInactivos' => 'Artículos Inactivos',
    'activarArticulo' => 'Activar Artículo',
    'usuarios'=> 'Usuarios',
    'mantenimientoUsuarios' => 'Mantenimiento Usuarios',
    'mantenimientoClientes' => 'Mantenimiento Clientes',
    'mantenimientoEmpleados' => 'Mantenimiento Empleados',
    'mantenimientoAdministradores' => 'Mantenimiento Administradores',
    'modificarUsuario'=> 'Modificación Usuario',
    'modificarCliente' => 'Modificación Cliente',
    'modificarEmpleado' => 'Modificación Empleado',
    'borrarCliente' => 'Borrar Cliente',
    'mantenimientoClientesInactivos' => 'Clientes Inactivos',
    'activarCliente' => 'Activar Cliente',
    'empleadosInactivos' => 'Empleados Inactivos',
    'activarEmpleado' => 'Activar Empleado',
    'administradoresInactivos' => 'Administradores Inactivos',
    'activarAdministrador' => 'Activar Administradores',
    'borrarAdministrador' => 'Borrar Administrador',
    'comprarArticulo' => 'Comprar Artículos'
);

// Obtener el parámetro de página actual
$current_page = isset($_GET['page']) ? $_GET['page'] : 'inicio';


$breadcrumbs = '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
$breadcrumbs .= '<li class="breadcrumb-item active custom-style"><a href="index.php?page=inicio">Home</a></li>';

// Agregar los enlaces a las páginas anteriores
foreach ($pages as $page => $label) {
    if ($page === $current_page) {
        $breadcrumbs .= '<li class="breadcrumb-item active custom-style">' . $label . '</li>';
        break;
    }
}

// Verificar si se ha seleccionado una categoría o subcategoría
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : null;
$subcategoriaSeleccionada = isset($_GET['subcategoria']) ? $_GET['subcategoria'] : null;

// Agregar categoría
if ($categoriaSeleccionada) {
    $breadcrumbs .= '<li class="breadcrumb-item active custom-style1"><a href="#">' . $categoriaSeleccionada . '</a></li>';
}

// Agregar subcategoría 
if ($subcategoriaSeleccionada) {
    $breadcrumbs .= '<li class="breadcrumb-item active custom-style1"><a href="#">' . $subcategoriaSeleccionada . '</a></li>';
}

$breadcrumbs .= '</ol></nav>';


?>
