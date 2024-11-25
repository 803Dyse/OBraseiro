<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Clase que instancia los datos de un pedido  el relacion al usuario, 
 * mostrando id del pedido, fecha, total etc
 */
class PedidoModel extends Model {

    protected $table = 'pedidos';
    protected $primaryKey = 'id_pedido';
    protected $allowedFields = [
        'id_usuario',
        'fecha_pedido',
        'forma_pago',
        'subtotal',
        'total',
        'estado'
    ];
}
