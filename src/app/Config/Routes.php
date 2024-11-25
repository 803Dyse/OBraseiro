<?php

use CodeIgniter\Router\RouteCollection;

/**
 * Router que indica donde está cada enlace de la web, aqui es donde se "enchufa"
 * cada ruta de la web.
 * Eventualmente, se utilizará el controlador para manejar operaciones de 
 * usuario y administrador.
 * @var RouteCollection $routes
 */
/* --- VISTAS --- */
$routes->get('/', 'PagesController::home');
$routes->get('acceso', 'AuthController::acceso');
$routes->get('menu', 'PagesController::menu');
$routes->get('quienes-somos', 'PagesController::quienesSomos');
$routes->get('realizar-pedido', 'PagesController::realizarPedido');

/* --- ACCIONES DEL SERVIDOR --- */
$routes->post('/registrar', 'AuthController::registrar');
$routes->get('/logout', 'AuthController::logout');
$routes->post('/login', 'AuthController::login');
$routes->get('/perfil', 'ProfileController::mostrarPerfilUsuario');

/* --- ACCIONES DEL USUARIO --- */
// Permite dar de baja a si mismo "eliminando" la cuenta
$routes->post('eliminar_cuenta', 'ProfileController::eliminar_cuenta');

// Permite cambiar la foto de perfil, esta foto se guardará en /public/uploads
$routes->post('cambiar_foto_perfil', 'ProfileController::cambiarFotoPerfil');

// Permite el cambio de contraseña
$routes->post('perfil/solicitar-cambio-password', 'ProfileController::solicitarCambioContrasena');
$routes->post('perfil/actualizar_contrasena', 'ProfileController::actualizarContrasena');
$routes->get('perfil/cambiar_contrasena/(:segment)', 'ProfileController::cambiarContrasena/$1');

// Permite el cambio de correo electronico
$routes->post('perfil/solicitar-cambio-correo', 'ProfileController::solicitarCambioCorreo');
$routes->post('perfil/actualizar_correo', 'ProfileController::actualizarCorreo');
$routes->get('perfil/cambiar_correo/(:segment)', 'ProfileController::cambiarCorreo/$1');

/* --- ADMIN --- */
$routes->get('admin', 'AdminController::cargarUsuarios');
$routes->get('admin/editar/(:num)', 'AdminController::editar/$1');
$routes->post('admin/actualizar/(:num)', 'AdminController::actualizar/$1');
$routes->post('/admin/guardar', 'AdminController::guardar');

/* --- CARTA (REALIZAR PEDIDO) --- */
$routes->post('/finalizar-pedido', 'PedidoController::guardarPedido');
$routes->get('/finalizar-compra', 'PedidoController::finalizarCompra');
$routes->post('/completar-compra', 'PedidoController::completarCompra');
