<?= $this->include('templates/header') ?>

<!-- Main content aqui -->
<main>
    <!-- Contenedor de encabezado + texto y foto -->
    <section
        class="max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8 items-start"
        >
        <div class="w-full lg:w-1/2">
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
        <div class="w-full lg:w-1/2 flex justify-center">
            <img
                src="img/png/equipoBraseiro.png"
                alt="Equipo de O Braseiro"
                class="w-full max-w-md rounded-lg shadow-lg"
                />
        </div>
    </section>

    <!-- Segundo encabezado y texto -->
    <section class="max-w-7xl mx-auto px-4 py-8">
        <h2 class="text-4xl font-bold text-black mb-6 text-center">
            Nuestra Pasión por la comida a la brasa
        </h2>
        <p class="text-gray-700 mb-6 text-justify">
            La dedicación a la calidad y el buen servicio es lo que nos distingue.
            En O Braseiro, cada plato es una celebración de sabores cuidadosamente
            seleccionados para ofrecerte la mejor experiencia gastronómica. Con un
            equipo comprometido y una cocina a la vista, nos enorgullecemos de
            crear momentos inolvidables con cada comida.
        </p>
    </section>

    <section
        class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 md:grid-cols-2 gap-8"
        >
        <div
            class="relative w-full h-[343px] overflow-hidden rounded-lg shadow-lg"
            >
            <!-- Slider de la primera columna -->
            <div
                class="absolute inset-0 transition-opacity duration-1000 slider-img first-slider"
                style="
                background-image: url('img/png/clientesFelices.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
            <div
                class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img first-slider"
                style="
                background-image: url('img/png/cortandoCostilla-1.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
            <div
                class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img first-slider"
                style="
                background-image: url('img/png/EquipoEnLaCocina-1.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
        </div>

        <div
            class="relative w-full h-[343px] overflow-hidden rounded-lg shadow-lg"
            >
            <!-- Slider de la segunda columna  -->
            <div
                class="absolute inset-0 transition-opacity duration-1000 slider-img second-slider"
                style="
                background-image: url('img/png/chicoEnLaParrilla-1.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
            <div
                class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img second-slider"
                style="
                background-image: url('img/png/empleadosEnLaCocinaTrabajando.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
            <div
                class="absolute inset-0 transition-opacity duration-1000 opacity-0 slider-img second-slider"
                style="
                background-image: url('img/png/cortandoPollo-1.png');
                background-size: cover;
                background-position: center;
                "
                ></div>
        </div>
    </section>
</main>

<?= $this->include('templates/footer') ?>