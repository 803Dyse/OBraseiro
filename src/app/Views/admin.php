<?= $this->include('templates/header') ?>

<?php
// Definimos estas variables para tener la disponibilidad de filtrar por la url
// usando formularios etc
$search = $search ?? '';
$filter = $filter ?? 'all';
?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="vanta-bg"></div>

<div class="flex flex-col min-h-screen">
    <div class="container mx-auto px-4 py-8 flex-grow">
        <form method="get" action="<?= base_url('/admin') ?>" class="mb-4">
            <div class="flex flex-col md:flex-row items-center">
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Buscar usuarios..." class="w-full md:w-1/2 border-4 border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500 mb-2 md:mb-0 md:mr-2">
                <select name="filter" class="w-full md:w-1/4 border-4 border-gray-300 rounded-md p-2 focus:outline-none focus:border-red-500 mb-2 md:mb-0 md:mr-2">
                    <option value="all" <?= $filter === 'all' ? 'selected' : '' ?>>Todos los campos</option>
                    <option value="id" <?= $filter === 'id' ? 'selected' : '' ?>>ID</option>
                    <option value="correo" <?= $filter === 'correo' ? 'selected' : '' ?>>Correo</option>
                    <option value="nombre" <?= $filter === 'nombre' ? 'selected' : '' ?>>Nombre y Apellidos</option>
                </select>
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Buscar
                </button>
            </div>
        </form>

        <div class="overflow-x-auto rounded-xl border-4 border-red-500 shadow-lg">
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-neutral-900 text-white text-2xl">
                        <th colspan="9" class="py-4 px-6 text-center rounded-t-xl">Administración de Usuarios</th>
                    </tr>
                    <tr class="bg-neutral-900 text-white uppercase text-sm leading-normal">
                        <?php

                        // Utilizo esta funcion para poder construir la consulta y posteriormente ejecutarla 
                        function build_sort_link($field, $order_by, $direction, $search, $filter)
                        {
                            $new_direction = ($order_by === $field && $direction === 'asc') ? 'desc' : 'asc';
                            $params = [
                                'order_by' => $field,
                                'direction' => $new_direction,
                                'search' => $search,
                                'filter' => $filter
                            ];
                            return base_url('/admin') . '?' . http_build_query($params);
                        }
                        ?>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'id') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('id', $order_by, $direction, $search, $filter) ?>">ID</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'id_rol') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('id_rol', $order_by, $direction, $search, $filter) ?>">Rol</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'estado') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('estado', $order_by, $direction, $search, $filter) ?>">Estado</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'nombre') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('nombre', $order_by, $direction, $search, $filter) ?>">Nombre</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'apellidos') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('apellidos', $order_by, $direction, $search, $filter) ?>">Apellidos</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'correo') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('correo', $order_by, $direction, $search, $filter) ?>">Correo</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'fecha_nacimiento') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('fecha_nacimiento', $order_by, $direction, $search, $filter) ?>">Fecha de Nacimiento</a>
                        </th>
                        <th class="py-3 px-6 text-left <?= ($order_by === 'fecha_registro') ? 'text-red-500' : '' ?>">
                            <a href="<?= build_sort_link('fecha_registro', $order_by, $direction, $search, $filter) ?>">Fecha de Registro</a>
                        </th>
                        <th class="py-3 px-6 text-center">Editar</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php if (!empty($usuarios)): ?>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                                <td class="py-3 px-6"><?= esc($usuario['id']) ?></td>
                                <!-- Mostramos el rol de forma legible -->
                                <td class="py-3 px-6">
                                    <?= esc($usuario['id_rol'] == '2' ? 'Administrador' : 'Usuario') ?>
                                </td>
                                <!-- Mostramos el estado de forma legible -->
                                <td class="py-3 px-6">
                                    <?= esc($usuario['estado'] == '1' ? 'Activo' : 'Inactivo') ?>
                                </td>
                                <td class="py-3 px-6"><?= esc($usuario['nombre']) ?></td>
                                <td class="py-3 px-6"><?= esc($usuario['apellidos']) ?></td>
                                <td class="py-3 px-6"><?= esc($usuario['correo']) ?></td>
                                <td class="py-3 px-6"><?= date('d-m-Y', strtotime($usuario['fecha_nacimiento'])) ?></td>
                                <td class="py-3 px-6"><?= date('d-m-Y H:i:s', strtotime($usuario['fecha_registro'])) ?></td>
                                <td class="py-3 px-6 text-center">
                                    <a href="<?= base_url('/admin/editar/' . $usuario['id']) ?>">
                                        <!-- Icono de edición -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24">
                                        <path d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="py-3 px-6 text-center text-red-400">No se encontraron usuarios.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr class="bg-neutral-900 text-white text-center text-sm">
                        <td colspan="9" class="py-3">
                            <div class="flex justify-center">
                                <!-- Usamos $pager->links() y los parámetros de consulta se reutilizan automáticamente -->
                                <?= $pager->links() ?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <script src="<?= base_url('js/fondoVanta.js') ?>"></script>

    <?= $this->include('templates/footer') ?>
</div>
