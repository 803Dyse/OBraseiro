<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="vanta-bg"></div>

<main class="flex flex-col min-h-screen mx-auto max-w-7xl px-4">
    <!-- Contenido de perfil aquí -->
    <div class="flex-grow w-full py-8 space-y-8">
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:gap-x-8">
            <div class="flex items-center bg-gray-100 shadow-2xl rounded-lg p-6 w-full md:w-1/3">
                <!-- Imagen de perfil -->
                <div class="flex items-center justify-center bg-gray-200 rounded-full h-24 w-24 mr-4">
                    <img src="<?= esc($fotoPerfil) ?>" alt="Foto de perfil" class="rounded-full h-24 w-24">
                </div>

                <div>
                    <h2 class="text-2xl font-bold text-black">¡Hola, <?= esc($user['nombre']) ?>!</h2>
                    <p class="text-sm text-gray-600">Bienvenido de nuevo</p>
                </div>
            </div>

            <!-- Tarjeta de Datos y Acciones -->
            <div class="flex flex-col md:flex-row bg-white shadow-2xl rounded-lg p-6 space-y-4 md:space-y-0 md:gap-x-4 w-full md:w-2/3">
                <!-- Información de usuario -->
                <div class="flex flex-col items-start space-y-2 w-full md:w-1/2">
                    <h3 class="text-xl font-bold text-black">Datos</h3>
                    <div class="text-sm text-gray-700 space-y-2">
                        <p><span class="font-bold">Nombre:</span> <?= esc($user['nombre'] . ' ' . $user['apellidos']) ?></p>
                        <p><span class="font-bold">Correo Electrónico:</span> <?= esc($user['correo']) ?></p>
                        <p><span class="font-bold">Fecha de Registro:</span> <?= date('d/m/Y', strtotime($user['fecha_registro'])) ?></p>
                        <p><span class="font-bold">Fecha de Nacimiento:</span> <?= date('d/m/Y', strtotime($user['fecha_nacimiento'])) ?></p>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="flex flex-col items-start space-y-2 w-full md:w-1/2">
                    <h3 class="text-xl font-bold text-black">Acciones</h3>
                    <div class="text-sm text-gray-700 space-y-2">
                        <p class="hover:underline cursor-pointer" id="cambiar-email" onclick="solicitarCambioCorreo()">Cambiar Correo Electrónico</p>
                        <p class="hover:underline cursor-pointer" id="cambiar-pass" onclick="solicitarCambioPassword()">Cambiar contraseña</p>

                        <!-- Cambiar foto de perfil -->
                        <form action="<?= base_url('cambiar_foto_perfil') ?>" method="post" enctype="multipart/form-data" id="formFotoPerfil">
                            <label for="foto_perfil" class="cursor-pointer text-blue-500 hover:underline">Cambiar foto de Perfil</label>
                            <input type="file" name="foto_perfil" id="foto_perfil" accept="image/jpeg, image/png, image/jpg" style="display: none;" onchange="document.getElementById('formFotoPerfil').submit();">
                        </form>

                        <!-- Eliminar la cuenta -->
                        <form action="<?= base_url('eliminar_cuenta') ?>" method="post" onsubmit="return confirm('¿Estás seguro de que deseas eliminar tu cuenta? Esta acción no se puede deshacer.');">
                            <button type="submit" class="text-red-500 hover:underline">Eliminar mi cuenta</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Historial de Pedidos -->
    <section class="bg-white shadow-2xl rounded-lg p-6">
        <h3 class="text-2xl font-bold text-center text-black mb-6">Historial de Pedidos</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b-2 p-4 font-semibold text-gray-800">ID Pedido</th>
                        <th class="border-b-2 p-4 font-semibold text-gray-800">Fecha del Pedido</th>
                        <th class="border-b-2 p-4 font-semibold text-gray-800">Método de Pago</th>
                        <th class="border-b-2 p-4 font-semibold text-gray-800">Subtotal</th>
                        <th class="border-b-2 p-4 font-semibold text-gray-800">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $pedido): ?>
                            <tr>
                                <td class="border-b p-4"><?= esc($pedido['id_pedido']) ?></td>
                                <td class="border-b p-4"><?= date('d-m-Y H:i', strtotime($pedido['fecha_pedido'])) ?></td>
                                <td class="border-b p-4"><?= esc($pedido['forma_pago']) ?></td>
                                <td class="border-b p-4">€<?= number_format($pedido['subtotal'], 2) ?></td>
                                <td class="border-b p-4">€<?= number_format($pedido['total'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td class="p-4 text-center" colspan="5">No tienes pedidos en tu historial.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

</main>

<script>
    var baseUrl = '<?= base_url(); ?>';
    var solicitarCambioPasswordUrl = '<?= base_url('perfil/solicitar-cambio-password') ?>';
    var solicitarCambioCorreoUrl = '<?= base_url('perfil/solicitar-cambio-correo') ?>';
</script>

<script src="<?= base_url('js/solicitarCambioPassword.js') ?>"></script>
<script src="<?= base_url('js/solicitarCambioCorreo.js') ?>"></script>
<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<?= $this->include('templates/footer') ?>
