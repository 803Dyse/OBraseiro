<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>

<div id="vanta-bg"></div>

<main class="mt-8 max-w-7xl mx-auto px-4 py-8 grid gap-8">

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Tarjeta quienes somos -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-4xl font-bold text-black mb-6 text-center">¿Quiénes Somos?</h2>
            <p class="text-gray-700 mb-6 text-justify">
                En O Braseiro somos un equipo apasionado por la buena comida y el
                sabor auténtico de los asados. Desde nuestros inicios, nos hemos
                comprometido a ofrecer a nuestros clientes productos de la mejor
                calidad, con ingredientes frescos y un proceso de preparación que
                garantiza ese sabor inconfundible. Nos especializamos en pollos
                asados, costillas y una variedad de platos a la brasa que están
                pensados para que puedas disfrutar en la comodidad de tu hogar.
            </p>
        </div>

        <!-- Imagen quienes somos -->
        <div class="relative w-full h-[343px] overflow-hidden rounded-lg shadow-lg">
            <img src="img/png/fotoDelEquipo.png" alt="Equipo de O Braseiro"
                 class="w-full h-full object-cover rounded-lg border-4 border-red-500" />
        </div>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold text-black mb-4 text-center">Nuestra Pasión por la comida a la brasa</h2>
            <p class="text-gray-700 text-justify">
                La dedicación a la calidad y el buen servicio es lo que nos distingue.
                En O Braseiro, cada plato es una celebración de sabores cuidadosamente
                seleccionados para ofrecerte la mejor experiencia gastronómica. Con un
                equipo comprometido y una cocina a la vista, nos enorgullecemos de
                crear momentos inolvidables con cada comida.
            </p>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold text-black mb-4 text-center">Filosofía del sabor auténtico</h2>
            <p class="text-gray-700 text-justify">
                En nuestra cocina, creemos que el sabor auténtico proviene de una combinación
                de ingredientes de alta calidad y métodos tradicionales de preparación. Cada plato
                en O Braseiro es una obra de amor y dedicación, pensada para llevar a tu mesa la esencia
                de los asados más auténticos. Nos enorgullece seguir técnicas que resaltan el sabor
                natural de cada ingrediente.
            </p>
        </div>
    </section>

    <!-- Sliders de imágenes -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="relative w-full h-[343px] overflow-hidden rounded-lg shadow-lg">
            <div class="absolute inset-0 transition-opacity duration-1000 slider-img first-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/clientesFelices.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
            <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img first-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/cortandoCostilla-1.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
            <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img first-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/EquipoEnLaCocina-1.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
        </div>

        <div class="relative w-full h-[343px] overflow-hidden rounded-lg shadow-lg">
            <div class="absolute inset-0 transition-opacity duration-1000 slider-img second-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/chicoEnLaParrilla-1.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
            <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img second-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/empleadosEnLaCocinaTrabajando.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
            <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img second-slider border-4 border-red-500"
                 style="
                 background-image: url('img/png/cortandoPollo-1.png');
                 background-size: cover;
                 background-position: center;
                 "></div>
        </div>
    </section>

</main>

<script src="<?= base_url('js/fondoVanta.js') ?>"></script>
<script src="<?= base_url('js/quienesSomos.js') ?>"></script>

<?= $this->include('templates/footer') ?>