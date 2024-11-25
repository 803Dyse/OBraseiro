<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/**
 * Esta clase nos permite crear filtros de url, permitiendo acceso segun nuestra
 *  necesidad. En este caso queremos capar las vistas de realizar-pedido y perfil
 */
class AuthFilter implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificamos si el usuario no está logueado
        if (!session()->get('isLoggedIn'))
        {
            // Redirige a la página de acceso si no está logueado
            return redirect()->to('/acceso');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
