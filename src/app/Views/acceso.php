<?= $this->include('templates/header') ?>

<!-- Este div se utilizará para meter la imagen de fondo en la vista de login/registrar -->
<div class="background-image"></div>

<!-- Mensajes de Error o Éxito -->
<?php if (session()->get('errors')): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 w-full max-w-md">
        <?php foreach (session()->get('errors') as $error): ?>
            <p><?= esc($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php if (session()->get('error')): ?>
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 w-full max-w-md">
        <p><?= esc(session()->get('error')) ?></p>
    </div>
<?php endif; ?>

<?php if (session()->get('success')): ?>
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 w-full max-w-md">
        <p><?= esc(session()->get('success')) ?></p>
    </div>
<?php endif; ?>

<!-- Formulario de Crear Cuenta -->
<main class="flex flex-col items-center justify-center min-h-screen mt-4 bg-transparent">
    <div id="form-crear-cuenta" class="formulario bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Crear Cuenta</h2>

        <!-- Formulario de registro usuario -->
        <form action="/registrar" method="post" class="space-y-4">
            <?= csrf_field() ?>
            <div class="campo">
                <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?= old('apellidos') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo:</label>
                <input type="email" id="correo" name="correo" value="<?= old('correo') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="fecha_nacimiento" class="block text-gray-700 text-sm font-bold mb-2">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= old('fecha_nacimiento') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="contrasena" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="confirmar_contrasena" class="block text-gray-700 text-sm font-bold mb-2">Confirmar contraseña:</label>
                <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
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
    <div id="form-acceder" class="formulario bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4 w-full max-w-md" style="display: none">
        <h2 class="text-2xl font-bold mb-6 text-center">Acceder</h2>
        <form action="/login" method="post" class="space-y-4">
            <?= csrf_field() ?>
            <div class="campo">
                <label for="correo_acceder" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                <input type="email" id="correo_acceder" name="correo_acceder" value="<?= old('correo_acceder') ?>" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
            <div class="campo">
                <label for="contrasena_acceder" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="contrasena_acceder" name="contrasena_acceder" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <div class="text-red-500 text-sm mt-1">
                    </div>
            </div>
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

<?= $this->include('templates/footer') ?>
