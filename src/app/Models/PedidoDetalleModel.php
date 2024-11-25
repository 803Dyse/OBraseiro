<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Clase que instancia los datos de detalles de un pedido
 */
class PedidoDetalleModel extends Model {

    protected $table = 'pedido_detalles';
    protected $primaryKey = 'id_detalle';
    protected $allowedFields = [
        'id_pedido',
        'nombre_item',
        'cantidad',
        'precio_unitario',
        'precio_total'
    ];
}
