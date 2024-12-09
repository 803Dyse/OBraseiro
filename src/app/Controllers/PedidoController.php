<?php

namespace App\Controllers;

use App\Models\PedidoModel;
use App\Models\PedidoDetalleModel;

/**
 * Controlador de los pedidos que se realizan, aqui se controla el procesar 
 * pedido, como se guarda un pedido, finalizar la compra y completar la compra.
 */
class PedidoController extends BaseController {

    /**
     * Guarda el pedido a traves de una peticion asíncrona en la vista realizarPedido
     * @return type
     */
    public function guardarPedido() {
        // Comprobamos que es una solicitud AJAX
        if ($this->request->isAJAX()) {
            $data = $this->request->getJSON(true);

            // Log para verificar el contenido de $data
            log_message('error', 'Data recibida en guardarPedido: ' . print_r($data, true));

            // Obtenemos el id del usuario de la sesión
            $id_usuario = session()->get('id');

            if (!$id_usuario) {
                // Si el usuario no existe, respondemos con un error
                return $this->response->setStatusCode(401)->setJSON(['message' => 'Usuario no autenticado']);
            }

            // Creamos un objeto de nuestro modelo
            $pedidoModel = new PedidoModel();
            $pedidoDetalleModel = new PedidoDetalleModel();

            // Preparamos los datos a guardar
            $pedidoData = [
                'id_usuario' => $id_usuario,
                'fecha_pedido' => date('Y-m-d H:i:s'),
                'forma_pago' => 'Pendiente',
                'subtotal' => $data['subtotal'] ?? 0, // Por seguridad, si no existe el índice, se usa 0
                'total' => $data['total'] ?? 0,
                'estado' => 'Sin Finalizar',
            ];

            try {
                // Intentamos insertar el pedido
                $id_pedido = $pedidoModel->insert($pedidoData);

                if ($id_pedido === false) {
                    // Si hay errores en la inserción del pedido, las registramos
                    log_message('error', 'Error al insertar pedido: ' . json_encode($pedidoModel->errors()));
                    return $this->response->setStatusCode(500)->setJSON(['message' => 'Error al insertar el pedido']);
                }

                // Insertamos los detalles del pedido
                foreach ($data['items'] as $nombreItem => $item) {
                    $detalleData = [
                        'id_pedido' => $id_pedido,
                        'nombre_item' => $nombreItem,
                        'cantidad' => $item['quantity'],
                        'precio_unitario' => $item['price'],
                        'precio_total' => $item['quantity'] * $item['price']
                    ];

                    $resDetalle = $pedidoDetalleModel->insert($detalleData);

                    if ($resDetalle === false) {
                        log_message('error', 'Error al insertar detalle: ' . json_encode($pedidoDetalleModel->errors()));
                        return $this->response->setStatusCode(500)->setJSON(['message' => 'Error al insertar el detalle']);
                    }
                }

                // Si todo va bien
                return $this->response->setStatusCode(200)->setJSON(['message' => 'Pedido guardado']);
            } catch (\Exception $e) {
                // Si ocurre una excepción inesperada, la registramos para ver la causa en logs
                log_message('error', 'Excepción al guardar el pedido: ' . $e->getMessage());
                return $this->response->setStatusCode(500)->setJSON(['message' => 'Error interno del servidor']);
            }
        } else {
            // Si no es una solicitud AJAX, 400
            return $this->response->setStatusCode(400)->setJSON(['message' => 'Solicitud inválida']);
        }
    }

    /**
     * Procesa, comprueba y determina si el pedido se finaliza o si queda 
     * pendiente (sin finalizar)
     * @return type
     */
    public function finalizarCompra() {
        // Pillamos el id del usuario
        $id_usuario = session()->get('id');

        if (!$id_usuario) {
            return redirect()->to('/acceso')->with('error', 'Debes iniciar sesión para continuar.');
        }

        // Aquí la logica, es coger su ultimo pedido realizado, asumiendo que el 
        // usuario está finalizando unicamente este pedido. Seguramente eso se 
        // puede reventar, pero no tengo mas sanidad mental para meter codigo en
        // este proyecto, esto supone crear una clase más con una serie de 
        // detecciones y validaciones.. Y esta vulnerabilidad solo se explotaria
        // en casos propositales y no accidentales, por esta razon parto de 
        // esta logica para finalizar un pedido en el sistema
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->where('id_usuario', $id_usuario)
                ->where('estado', 'Sin Finalizar')
                ->orderBy('fecha_pedido', 'DESC')
                ->first();

        // Si no hay pedido redirigimos con mensaje, es que ningun tipo va 
        // intentar meterse en una url de estas de esta manera.. pero bueno, 
        // lo tengo capado por si acaso
        if (!$pedido) {
            return redirect()->to('/realizar-pedido')->with('error', 'No tienes pedidos pendientes.');
        }

        $pedidoDetalleModel = new PedidoDetalleModel();

        // Metemos los detalles del pedido en el objeto que creamos arriba, y 
        // los datos obtenidos tienen que coincidir con un pedido que tenga dicho id
        $detalles = $pedidoDetalleModel->where('id_pedido', $pedido['id_pedido'])->findAll();

        // Pasamos los datos a la vista
        return view('finalizar_compra', [
            'pedido' => $pedido,
            'detalles' => $detalles
        ]);
    }

    /**
     * A diferencia de finalizar compra, aqui la completamos. Que quiere decir
     * esto, que esto metodo termina el ultimo paso necesario para efectuar el
     * pago y tramitar el pedido.
     * @return type
     */
    public function completarCompra() {
        // Pillamos el id del usuario
        $id_usuario = session()->get('id');

        if (!$id_usuario) {
            return redirect()->to('/acceso')->with('error', 'Debes iniciar sesión para continuar.');
        }

        // Validamos el formulario
        $forma_pago = $this->request->getPost('forma_pago');

        // Cogemos el ultimo pedido con el estado 'Sin Finalizar'
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->where('id_usuario', $id_usuario)
                ->where('estado', 'Sin Finalizar')
                ->orderBy('fecha_pedido', 'DESC')
                ->first();

        if (!$pedido) {
            return redirect()->to('/realizar-pedido')->with('error', 'No tienes pedidos pendientes.');
        }

        // Actualizamos el pedido con el estado a finalizado, indicando que el 
        // tio o la tia ya pago y efectuo el pago, con su pedido finalizado
        $pedidoModel->update($pedido['id_pedido'], [
            'forma_pago' => $forma_pago,
            'estado' => 'Finalizado'
        ]);

        // Mandamos un mensaje de exito cuando el pedido está finalizado
        session()->setFlashdata('success', 'Tu pedido estará listo para recoger en 30 minutos! Gracias por confiar en nuestra calidad!');

        // Redireccionamos a inicio y listo
        return redirect()->to('/perfil');
    }
}
