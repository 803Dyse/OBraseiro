<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CartaController extends BaseController
{
    public function realizarPedido()
    {
        // Simulación de datos de la carta
        $categorias = [
            [
                'nombre' => 'Carnes',
                'productos' => [
                    ['id' => 1, 'nombre' => 'Pollo a la brasa', 'precio_media' => 5.5, 'precio_racion' => 10],
                    ['id' => 2, 'nombre' => 'Costilla', 'precio_media' => 12, 'precio_racion' => 24],
                ],
            ],
            [
                'nombre' => 'Acompañamientos',
                'productos' => [
                    ['id' => 3, 'nombre' => 'Patatas Fritas', 'precio_media' => 2.2, 'precio_racion' => 4.5],
                    ['id' => 4, 'nombre' => 'Ensaladilla', 'precio_media' => 2.5, 'precio_racion' => 5],
                ],
            ],
        ];

        // Pasar los datos a la vista
        return view('realizarPedido', ['categorias' => $categorias]);
    }
}
