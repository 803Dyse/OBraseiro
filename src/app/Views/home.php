<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/home.css') ?>" />

<?php if (session()->getFlashdata('compra_exitosa')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<?php endif; ?>



<main>
    <div class="relative flex items-center justify-center text-center h-[500px] md:h-[954px] overflow-hidden">
        <img src="<?= base_url('img/png/imagenFondoBarbacoa.png') ?>" alt=""
             class="blur-sm w-full h-full object-cover object-top" />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h2 class="text-4xl md:text-8xl font-bold text-white drop-shadow-2xl" id="txtPrincipal">
                ¿Nuevo por aquí? <br />
                ¡Descubre nuestro <span id="palabraMenu">menú</span>!
            </h2>
            <a href="<?= base_url('menu') ?>">
                <button
                    class="mt-4 md:mt-10 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-xl text-2xl md:text-3xl shadow-2xl"
                    id="btnPrincipal">
                    Ir al Menú
                </button>
            </a>
        </div>
    </div>

    <!-- Contenedor texto y slider -->
    <section
        class="max-w-7xl mx-auto px-4 py-12 flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8 mt-12">
        <!-- Columna de texto -->
        <div class="w-full md:w-1/2 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-black mb-6">
                ¿Qué te apetece hoy?
            </h2>
            <p class="text-gray-700 mb-6 text-justify">
                Con nuestra carta variada, siempre encontrarás algo que te encante.
                En O Braseiro, nos adaptamos a tu ritmo. Explora nuestra deliciosa
                selección de platos y llama para hacer tu pedido. Solo tienes que
                indicarnos la hora que te viene mejor, y nos encargamos de
                prepararlo justo a tiempo. Sin prisas, sin esperas, solo pasas a
                recoger cuando te venga bien.
            </p>
            <div class="flex justify-center">
                <a href="<?= base_url('realizar-pedido') ?>">
                    <button
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 md:py-3 px-4 md:px-6 rounded-xl">
                        Realizar Pedido
                    </button>
                </a>
            </div>
        </div>

        <!-- Columna del slider -->
        <div class="w-full md:w-1/2">
            <div class="relative">
                <div class="w-full h-[200px] md:w-[560px] md:h-[295px] relative overflow-hidden rounded-sm shadow-md">
                    <!-- Botones de navegación -->
                    <button id="prev"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full z-10">
                        &lt;
                    </button>
                    <button id="next"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 text-white p-2 rounded-full z-10">
                        &gt;
                    </button>

                    <!-- Slides -->
                    <div class="imgSlider absolute top-0 left-0 w-full h-full transition-all duration-300">
                        <picture>
                            <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa5movil.png') ?>" />
                            <source media="(min-width: 417px)"
                                    srcset="<?= base_url('img/png/barbacoa5resized.png') ?>" />
                            <img src="<?= base_url('img/png/barbacoa5resized.png') ?>" alt="Imagen de barbacoa"
                                 class="w-full h-full object-cover" />
                        </picture>
                    </div>

                    <div class="imgSlider absolute top-0 left-full w-full h-full transition-all duration-300">
                        <picture>
                            <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa3movil.png') ?>" />
                            <source media="(min-width: 417px)"
                                    srcset="<?= base_url('img/png/barbacoa3resized.png') ?>" />
                            <img src="<?= base_url('img/png/barbacoa3resized.png') ?>" alt="Imagen de barbacoa"
                                 class="w-full h-full object-cover" />
                        </picture>
                    </div>

                    <div class="imgSlider absolute top-0 left-full w-full h-full transition-all duration-300">
                        <picture>
                            <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa1movil.png') ?>" />
                            <source media="(min-width: 417px)"
                                    srcset="<?= base_url('img/png/barbacoa1resized.png') ?>" />
                            <img src="<?= base_url('img/png/barbacoa1resized.png') ?>" alt="Imagen de barbacoa"
                                 class="w-full h-full object-cover" />
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="my-8 border-t border-black max-w-7xl mx-auto px-4" />

    <section class="max-w-7xl mx-auto px-4 py-12 overflow-hidden">
        <div class="flex items-center space-x-4 md:space-x-8 animate-scroll">
            <div class="w-[300px] h-[150px] md:w-[560px] md:h-[295px] rounded-sm shadow-md">
                <picture>
                    <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa7movil.png') ?>" />
                    <source media="(min-width: 417px)" srcset="<?= base_url('img/png/barbacoa7.png') ?>" />
                    <img src="<?= base_url('img/png/barbacoa7.png') ?>" alt="Imagen de barbacoa"
                         class="w-full h-full object-cover" />
                </picture>
            </div>

            <div class="w-[300px] h-[150px] md:w-[560px] md:h-[295px] rounded-sm shadow-md">
                <picture>
                    <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa8movil.png') ?>" />
                    <source media="(min-width: 417px)" srcset="<?= base_url('img/png/barbacoa8.png') ?>" />
                    <img src="<?= base_url('img/png/barbacoa8.png') ?>" alt="Imagen de barbacoa"
                         class="w-full h-full object-cover" />
                </picture>
            </div>

            <div class="w-[300px] h-[150px] md:w-[560px] md:h-[295px] rounded-sm shadow-md">
                <picture>
                    <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa9movil.png') ?>" />
                    <source media="(min-width: 417px)" srcset="<?= base_url('img/png/barbacoa9.png') ?>" />
                    <img src="<?= base_url('img/png/barbacoa9.png') ?>" alt="Imagen de barbacoa"
                         class="w-full h-full object-cover" />
                </picture>
            </div>

            <div class="w-[300px] h-[150px] md:w-[560px] md:h-[295px] rounded-sm shadow-md">
                <picture>
                    <source media="(max-width: 416px)" srcset="<?= base_url('img/png/barbacoa10movil.png') ?>" />
                    <source media="(min-width: 417px)" srcset="<?= base_url('img/png/barbacoa10.png') ?>" />
                    <img src="<?= base_url('img/png/barbacoa10.png') ?>" alt="Imagen de barbacoa"
                         class="w-full h-full object-cover" />
                </picture>
            </div>
        </div>
    </section>

    <hr class="my-8 border-t border-black max-w-7xl mx-auto px-4" />

    <section
        class="max-w-7xl mx-auto px-4 py-12 flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8">
        <div class="w-full md:w-1/2 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-black mb-6">
                Encargar por teléfono
            </h2>
            <p class="text-gray-700 mb-6 text-justify">
                También puedes encargar tu pedido llamándonos al 9865 434 542 125.
                Indícanos lo que deseas, elige la hora de recogida y nos encargamos
                de tenerlo listo cuando llegues. Servicio rápido y eficiente, sin
                esperas.
            </p>
            <p class="text-3xl md:text-4xl font-bold mb-6 text-center">
                9865 434 542 125
            </p>
        </div>

        <!-- Columna de la imagen -->
        <div class="w-full md:w-1/2">
            <div class="relative">
                <img src="<?= base_url('img/png/empleadoEnElTelefono.png') ?>"
                     alt="Imagen del encargado atendiendo cliente en el teléfono"
                     class="w-full h-auto rounded-lg shadow-lg object-cover" />

            </div>
        </div>
    </section>
</main>

<script src="<?= base_url('js/homeSlider.js') ?>"></script>

<?= $this->include('templates/footer') ?>