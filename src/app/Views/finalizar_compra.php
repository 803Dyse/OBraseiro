<?= $this->include('templates/header') ?>

<main class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Finalizar Compra</h1>

    <h2 class="text-2xl font-semibold mb-4">Detalles del Pedido</h2>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="border px-4 py-2">Cantidad</th>
                <th class="border px-4 py-2">Ítem</th>
                <th class="border px-4 py-2">Precio Unitario</th>
                <th class="border px-4 py-2">Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detalles as $detalle): ?>
                <tr>
                    <td class="border px-4 py-2 text-center"><?= $detalle['cantidad'] ?></td>
                    <td class="border px-4 py-2 text-center"><?= $detalle['nombre_item'] ?></td>
                    <td class="border px-4 py-2 text-center">€<?= number_format($detalle['precio_unitario'], 2) ?></td>
                    <td class="border px-4 py-2 text-center">€<?= number_format($detalle['precio_total'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-6">
        <p class="text-lg"><strong>Subtotal:</strong> €<?= number_format($pedido['subtotal'], 2) ?></p>
        <p class="text-lg"><strong>IVA (10%):</strong> <?php
            $iva = $pedido['total'] - $pedido['subtotal'];
            echo '€' . number_format($iva, 2);
            ?></p>
        <p class="text-xl font-bold"><strong>Total:</strong> €<?= number_format($pedido['total'], 2) ?></p>
    </div>

    <h2 class="text-2xl font-semibold mt-8 mb-4">Forma de Pago</h2>
    <form action="<?= base_url('/completar-compra') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label for="forma_pago" class="block text-gray-700">Selecciona la forma de pago:</label>
            <select name="forma_pago" id="forma_pago" class="mt-2 p-2 border rounded w-full" required>
                <option value="">Selecciona una opción</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Efectivo">Efectivo</option>
            </select>
        </div>
        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-500 transition-all">
            Completar Compra
        </button>
    </form>
</main>

<?= $this->include('templates/footer') ?>
