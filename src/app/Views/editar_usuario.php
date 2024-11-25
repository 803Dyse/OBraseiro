<?= $this->include('templates/header') ?>

<?php $validation = session('validation'); ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div id="vanta-bg"></div>

<div class="mx-auto px-4 py-8 min-h-screen flex flex-col flex-grow items-center mt-8">
    <?php if (session('error')): ?>
        <div class="text-red-500 text-center mb-4"><?= session('error') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('/admin/guardar') ?>" method="post" class="w-full max-w-2xl bg-white rounded-xl shadow-lg border-4 border-red-500">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?= esc($usuario['id']) ?>">

        <div class="bg-neutral-900 text-white text-2xl py-4 px-6 text-center rounded-t-lg">Editar Usuario</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
            <div>
                <label for="nombre" class="block font-semibold mb-1">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?= esc(old('nombre', $usuario['nombre'])) ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                <?php if ($validation && $validation->getError('nombre')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('nombre') ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label for="apellidos" class="block font-semibold mb-1">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" value="<?= esc(old('apellidos', $usuario['apellidos'])) ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                <?php if ($validation && $validation->getError('apellidos')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('apellidos') ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label for="correo" class="block font-semibold mb-1">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?= esc(old('correo', $usuario['correo'])) ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                <?php if ($validation && $validation->getError('correo')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('correo') ?></div>
                <?php endif; ?>
            </div>
            <div>
                <label for="fecha_nacimiento" class="block font-semibold mb-1">Fecha de Nacimiento:</label>
                <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= esc(old('fecha_nacimiento', $usuario['fecha_nacimiento'])) ?>" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                <?php if ($validation && $validation->getError('fecha_nacimiento')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('fecha_nacimiento') ?></div>
                <?php endif; ?>
            </div>
            <!-- Nuevo campo para estado -->
            <div>
                <label for="estado" class="block font-semibold mb-1">Estado:</label>
                <select id="estado" name="estado" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                    <option value="1" <?= old('estado', $usuario['estado']) == '1' ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= old('estado', $usuario['estado']) == '0' ? 'selected' : '' ?>>Inactivo</option>
                </select>
                <?php if ($validation && $validation->getError('estado')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('estado') ?></div>
                <?php endif; ?>
            </div>
            <!-- Nuevo campo para id_rol -->
            <div>
                <label for="id_rol" class="block font-semibold mb-1">Rol:</label>
                <select id="id_rol" name="id_rol" class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500">
                    <option value="1" <?= old('id_rol', $usuario['id_rol']) == '1' ? 'selected' : '' ?>>Usuario</option>
                    <option value="2" <?= old('id_rol', $usuario['id_rol']) == '2' ? 'selected' : '' ?>>Administrador</option>
                </select>
                <?php if ($validation && $validation->getError('id_rol')): ?>
                    <div class="text-red-500 text-sm mt-1"><?= $validation->getError('id_rol') ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="bg-neutral-900 text-center text-sm py-4 rounded-b-lg">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Guardar Cambios
            </button>
            <a href="<?= base_url('/admin') ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-2">
                Cancelar
            </a>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#fecha_nacimiento", {
            dateFormat: "d-m-Y",
            altInput: true,
            altFormat: "d-m-Y",
            maxDate: "today"
        });
    });
</script>

<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<?= $this->include('templates/footer') ?>
