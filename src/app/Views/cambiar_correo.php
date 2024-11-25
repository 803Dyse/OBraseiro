<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>

<div id="vanta-bg"></div>

<div class="flex flex-col items-center justify-center min-h-screen mt-4 bg-transparent" style="position: relative;">
    <div class="card p-4 bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h2 class="text-center text-2xl font-bold mb-6">Cambiar Correo Electrónico</h2>

        <!-- Muestra errores si existen -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="text-red-500 text-sm font-bold mb-4">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('perfil/actualizar_correo') ?>" method="post" class="space-y-4">
            <input type="hidden" name="token" value="<?= esc($token) ?>">

            <div class="campo">
                <label for="new_email" class="block text-gray-700 text-sm font-bold mb-2">Nuevo Correo Electrónico</label>
                <input type="email" name="new_email" id="new_email" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <div class="campo">
                <label for="confirm_email" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Nuevo Correo Electrónico</label>
                <input type="email" name="confirm_email" id="confirm_email" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>

            <button type="submit"
                    class="btn w-full bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Actualizar Correo
            </button>
        </form>
    </div>
</div>
<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<?= $this->include('templates/footer') ?>
