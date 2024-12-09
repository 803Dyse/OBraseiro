<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
<div id="vanta-bg"></div>

<main class="flex flex-col min-h-screen items-center py-8">
    <!-- Tabla de Detalles del Pedido -->
    <section class="w-full max-w-4xl bg-white shadow-md rounded-md p-4 mb-6">
        <div class="bg-red-600 text-white text-center font-bold text-xl py-2 rounded-t-md">
            Detalles del Pedido
        </div>
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-left">Cantidad</th>
                    <th class="border px-4 py-2 text-left">Ítem</th>
                    <th class="border px-4 py-2 text-right">Precio Unitario</th>
                    <th class="border px-4 py-2 text-right">Precio Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detalles as $detalle): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2 text-center"><?= $detalle['cantidad'] ?></td>
                        <td class="border px-4 py-2"><?= $detalle['nombre_item'] ?></td>
                        <td class="border px-4 py-2 text-right">€<?= number_format($detalle['precio_unitario'], 2) ?></td>
                        <td class="border px-4 py-2 text-right">€<?= number_format($detalle['precio_total'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Subtotal, IVA y Total -->
    <section class="w-full max-w-4xl bg-white shadow-md rounded-md p-4 mb-6">
        <div class="flex justify-between items-center">
            <p class="text-lg font-medium">Subtotal:</p>
            <p class="text-lg font-bold">€<?= number_format($pedido['subtotal'], 2) ?></p>
        </div>
        <div class="flex justify-between items-center mt-2">
            <p class="text-lg font-medium">IVA (10%):</p>
            <p class="text-lg font-bold">€<?= number_format($pedido['total'] - $pedido['subtotal'], 2) ?></p>
        </div>
        <div class="flex justify-between items-center mt-4 border-t pt-4">
            <p class="text-xl font-bold">Total:</p>
            <p class="text-xl font-bold text-green-600">€<?= number_format($pedido['total'], 2) ?></p>
        </div>
    </section>

    <!-- Forma de Pago -->
    <section class="w-full max-w-4xl bg-white shadow-md rounded-md p-4">
        <div class="text-lg font-bold mb-4">Forma de Pago</div>
        <form action="<?= base_url('/completar-compra') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label for="forma_pago" class="block text-gray-700 mb-2">Selecciona la forma de pago:</label>
                <select name="forma_pago" id="forma_pago" class="w-full p-2 border rounded-md" required>
                    <option value="">Selecciona una opción</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Efectivo">Efectivo</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md hover:bg-green-500 transition-all">
                Completar Compra
            </button>
        </form>
    </section>
</main>

<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<?= $this->include('templates/footer') ?>
