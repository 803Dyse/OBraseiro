<?php

use CodeIgniter\Router\RouteCollection;

/**
 * Este tío nos apunta con la mano y nos dice donde está cada cosa..
 * Luego mas adelante, cuando lleguemos a la cosa que queremos otro tio llamado
 * Pages.php
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::home');
$routes->get('acceso', 'Pages::acceso');
$routes->get('menu', 'Pages::menu');
$routes->get('perfil', 'Pages::perfil');
$routes->get('quienes-somos', 'Pages::quienesSomos');
$routes->get('realizar-pedido', 'Pages::realizarPedido');

