<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/acceso.css') ?>" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<div class="background-image"></div>

<!-- Formulario de Crear Cuenta -->
<main class="flex flex-col items-center justify-center min-h-screen mt-4 bg-transparent">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="p-3.5 text-red-500 text-center font-bold mb-4 bg-white rounded text-2xl border-4 border-red-500">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div id="form-crear-cuenta" class="formulario bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md border-4 border-red-500">
        <h2 class="text-2xl font-bold mb-6 text-center">Crear Cuenta</h2>

        <!-- Formulario de registro usuario -->
        <form action="/registrar" method="post" class="space-y-4">
            <?= csrf_field() ?>
            <div class="campo">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.nombre')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.nombre') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?= old('apellidos') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.apellidos')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.apellidos') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?= old('correo') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.correo')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.correo') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="fecha_nacimiento" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="dd-mm-aaaa" value="<?= old('fecha_nacimiento') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.fecha_nacimiento')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.fecha_nacimiento') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.contrasena')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.contrasena') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="confirmar_contrasena" class="block text-gray-700 text-sm font-bold mb-2">Confirmar contraseña:</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.confirmar_contrasena')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.confirmar_contrasena') ?></div>
                <?php endif; ?>
            </div>
            <button type="submit"
                    class="btn w-full bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Crear Cuenta
            </button>
        </form>

        <p class="text-center mt-4 text-black">
            ¿Ya tienes cuenta?
            <span id="acceder-link" class="enlace text-red-500 cursor-pointer font-bold">Accede aquí</span>
        </p>
    </div>

    <!-- Formulario de acceso usuario (login) -->
    <div id="form-acceder" class="formulario bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md border-4 border-red-500" style="display: none">
        <h2 class="text-2xl font-bold mb-6 text-center">Acceder</h2>
        <form action="/login" method="post" class="space-y-4">
            <?= csrf_field() ?>
            <div class="campo">
                <label for="correo_acceder" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                <input type="email" id="correo_acceder" name="correo_acceder" value="<?= old('correo_acceder') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.correo_acceder')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.correo_acceder') ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="contrasena_acceder" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena_acceder" name="contrasena_acceder" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                       <?php if (session('errors.contrasena_acceder')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= session('errors.contrasena_acceder') ?></div>
                <?php endif; ?>
            </div>
            <?php if (session('errors.login')): ?>
                <div class="text-red-500 text-sm mt-4"><?= session('errors.login') ?></div>
            <?php endif; ?>
            <button type="submit"
                    class="btn w-full bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Acceder
            </button>
        </form>
        <p class="text-center mt-4 text-black">
            ¿No tienes cuenta?
            <span id="registrar-form-link" class="enlace text-red-500 cursor-pointer font-bold">Regístrate aquí</span>
        </p>
    </div>
</main>

<script src="<?= base_url('js/calendarioAcceso.js') ?>"></script>

<script>
    // Chequeamos si hay error, y si los hay los mandamos al formulario
    const formError = '<?= session()->getFlashdata('form_error') ?>';

    document.addEventListener("DOMContentLoaded", function () {
        // Si existe el error de login mostramos el formulario de login
        if (formError === 'login') {
            document.getElementById("form-crear-cuenta").style.display = "none";
            document.getElementById("form-acceder").style.display = "block";
        } else {
            // De lo contrario: mostramos el formulario de registro por defecto
            document.getElementById("form-crear-cuenta").style.display = "block";
            document.getElementById("form-acceder").style.display = "none";
        }
    });

    // Estos eventos cambian el formulario manualmente
    document.getElementById("acceder-link").addEventListener("click", function () {
        document.getElementById("form-crear-cuenta").style.display = "none";
        document.getElementById("form-acceder").style.display = "block";
    });

    document.getElementById("registrar-form-link").addEventListener("click", function () {
        document.getElementById("form-acceder").style.display = "none";
        document.getElementById("form-crear-cuenta").style.display = "block";
    });
</script>

<?= $this->include('templates/footer') ?>
 