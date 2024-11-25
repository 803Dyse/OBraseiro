<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>O Braseiro Asador</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="<?= base_url('css/output.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('css/global.css') ?>" />
        <link rel="stylesheet" href="<?= base_url('css/header.css') ?>" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
              rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>


    <body>
        
        <?php if (session()->getFlashdata('success')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Éxito!',
                    text: '<?= session()->getFlashdata('success'); ?>',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session()->getFlashdata('error'); ?>',
                    confirmButtonText: 'Aceptar'
                });
            </script>
        <?php endif; ?>
            
        <!-- Menú de escritorio -->
        <header id="desktop-menu" class="bg-zinc-900 text-white py-4 shadow-lg border-b-4 border-red-600 relative">
            <div class="max-w-7xl mx-auto px-4 flex items-center justify-between relative">
                <div class="w-1/4">

                    <a href="<?= base_url('/') ?>">
                        <img src="<?= base_url('img/png/O_Braseiro.png') ?>" alt="logo de la web O Braseiro"
                             class="w-48 drop-shadow-[0_0_5px_rgba(255,255,255,0.5)] hover:drop-shadow-[0_0_10px_rgba(255,255,255,0.7)] transition-all duration-300" />
                    </a>
                </div>
                <nav class="flex-grow flex justify-center">
                    <ul class="flex space-x-12">
                        <li><a id="menu-link" href="<?= base_url('menu') ?>"
                               class="text-lg font-semibold uppercase relative top-2 tracking-wider hover:text-red-500 transition-all duration-300 border-b-2 border-transparent hover:border-red-500">Menú</a>
                        </li>
                        <li><a id="encargar-link" href="<?= base_url('realizar-pedido') ?>"
                               class="text-lg font-semibold uppercase relative top-2 tracking-wider hover:text-red-500 transition-all duration-300 border-b-2 border-transparent hover:border-red-500">Encargar</a>
                        </li>
                        <li><a id="quienesSomos-link" href="<?= base_url('quienes-somos') ?>"
                               class="text-lg font-semibold uppercase relative top-2 tracking-wider hover:text-red-500 transition-all duration-300 border-b-2 border-transparent hover:border-red-500">Quiénes
                                Somos</a></li>

                        <!-- Mostrar "Registrar" solo si el usuario no está logueado -->
                        <?php if (!session()->get('isLoggedIn')): ?>
                            <li><a id="registrar-link" href="<?= base_url('acceso') ?>"
                                   class="text-lg font-semibold uppercase relative top-2 tracking-wider hover:text-red-500 transition-all duration-300 border-b-2 border-transparent hover:border-red-500">Registrar</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="w-1/4 flex justify-end space-x-6">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <!-- Verificamos si el usuario es administrador -->
                        <?php if (session()->get('id_rol') == 2): ?>
                            <a href="<?= base_url('admin') ?>" class="hover:text-red-500 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 fill-current text-white hover:text-red-500 transition-all duration-300" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                        <!-- Icono de Logout cuando está logueado -->
                        <a href="<?= base_url('logout') ?>" class="hover:text-red-500 transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 class="w-9 h-9 fill-current text-white hover:text-red-500 transition-all duration-300">
                            <path fill="currentColor"
                                  d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                            </svg>
                        </a>
                    <?php endif; ?>
                    <a href="<?= base_url('perfil') ?>">
                        <svg class="w-8 h-8 fill-current text-white hover:text-red-500 transition-all duration-300"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M224 256a128 128 0 1 0 0-256a128 128 0 1 0 0 256m-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c16.4 0 29.7-13.3 29.7-29.7c0-98.5-79.8-178.3-178.3-178.3z" />
                        </svg>
                    </a>
                    <a href="<?= base_url('realizar-pedido') ?>">
                        <svg class="w-9 h-9 fill-current text-white hover:text-red-500 transition-all duration-300"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M9 20c0 1.1-.9 2-2 2s-1.99-.9-1.99-2S5.9 18 7 18s2 .9 2 2m8-2c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2m.396-5a2 2 0 0 0 1.952-1.566L21 5H7V4a2 2 0 0 0-2-2H3v2h2v11a2 2 0 0 0 2 2h12a2 2 0 0 0-2-2H7v-2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </header>

        <!-- Menú de móvil (hamburguesa) -->
        <header id="mobile-menu" class="bg-zinc-900 text-white py-4 shadow-lg">
            <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
                <a href="<?= base_url('/') ?>">
                    <img src="<?= base_url('img/png/O_Braseiro.png') ?>" alt="logo de la web O Braseiro"
                         class="w-40 drop-shadow-[0_0_15px_rgba(255,255,255,1)]" />
                </a>
                <?php if (session()->get('isLoggedIn')): ?>
                    <!-- Icono de Logout cuando está logueado -->
                    <a href="<?= base_url('logout') ?>" class="hover:text-red-500 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             class="w-9 h-9 fill-current text-white hover:text-red-500 transition-all duration-300">
                        <path fill="currentColor"
                              d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z" />
                        </svg>
                    </a>
                <?php endif; ?>
                <div class="flex space-x-3 items-center">
                    <a href="<?= base_url('perfil') ?>">
                        <svg class="w-7 h-7 fill-current text-white" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 448 512">
                        <path
                            d="M224 256a128 128 0 1 0 0-256a128 128 0 1 0 0 256m-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512h388.6c16.4 0 29.7-13.3 29.7-29.7c0-98.5-79.8-178.3-178.3-178.3z" />
                        </svg>
                    </a>
                    <a href="<?= base_url('realizar-pedido') ?>">
                        <svg class="w-8 h-8 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M9 20c0 1.1-.9 2-2 2s-1.99-.9-1.99-2S5.9 18 7 18s2 .9 2 2m8-2c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2m.396-5a2 2 0 0 0 1.952-1.566L21 5H7V4a2 2 0 0 0-2-2H3v2h2v11a2 2 0 0 0 2 2h12a2 2 0 0 0-2-2H7v-2z" />
                        </svg>
                    </a>
                    <button id="menu-toggle" class="text-white focus:outline-none">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path fill="currentColor"
                              d="M3 6h18c.6 0 1-.4 1-1s-.4-1-1H3c-.6 0-1 .4-1 1s.4 1 1 1zm18 5H3c-.6 0-1 .4-1 1s.4 1 1 1h18c.6 0 1-.4 1-1s-.4-1-1-1zm0 6H3c-.6 0-1 .4-1 1s.4 1 1 1h18c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Menú fullscreen de móvil -->
        <div id="fullscreen-menu"
             class="fixed inset-0 bg-zinc-900 text-white opacity-0 flex-col items-center justify-center z-50 transition-all transform translate-x-full duration-500">
            <button id="menu-close" class="absolute top-4 right-4 text-white text-3xl focus:outline-none">
                X
            </button>
            <ul class="space-y-8 text-2xl font-semibold uppercase tracking-wider text-center pt-24">
                <li>
                    <a href="<?= base_url('menu') ?>"
                       class="transition-all duration-300 border-b-2 border-transparent hover:bg-red-500 hover:text-white">Menú</a>
                </li>
                <li>
                    <a href="<?= base_url('realizar-pedido') ?>"
                       class="transition-all duration-300 border-b-2 border-transparent hover:bg-red-500 hover:text-white">Encargar</a>
                </li>
                <li>
                    <a href="<?= base_url('quienes-somos') ?>"
                       class="transition-all duration-300 border-b-2 border-transparent hover:bg-red-500 hover:text-white">Quiénes
                        Somos</a>
                </li>

                <!-- Mostrar "Registrar" solo si el usuario no está logueado -->
                <?php if (!session()->get('isLoggedIn')): ?>
                    <li>
                        <a href="<?= base_url('acceso') ?>"
                           class="transition-all duration-300 border-b-2 border-transparent hover:bg-red-500 hover:text-white">Registrar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>


