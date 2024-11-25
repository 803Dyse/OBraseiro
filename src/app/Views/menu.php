<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>

<div id="vanta-bg"></div>

<main class="mt-8">
    <!-- Contenedor del texto/menú/reseñas -->
    <section class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 items-start">

        <!-- Contenedor de texto -->
        <div class="w-full lg:w-1/2">
            <div class="bg-white shadow-lg p-6 rounded-lg">
                <h2 class="text-4xl font-bold text-black mb-6 text-center">
                    ¡Haz tu pedido y recógelo!
                </h2>
                <p class="text-gray-700 mb-6 text-justify">
                    En O Braseiro somos especialistas en pollos asados, costillas y
                    otros platos a la brasa. Nuestro local es exclusivamente para
                    recogida de pedidos: tú llamas, nosotros lo preparamos y
                    simplemente pasas a recogerlo a la hora que mejor te convenga. Sin
                    prisa, sin complicaciones.
                </p>
                <div class="flex justify-center">
                    <a href="<?= base_url('realizar-pedido') ?>">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-xl">
                            Realizar Pedido
                        </button>
                    </a>
                </div>
            </div>

            <!-- Reseñas de clientes 
            Observacion: El apartado de las reseñas no me gusta como quedó,
            y esto se debe a cuidados y limtaciones del proyecto, donde exponería
            nombres y fotos reales, portanto notarás que las reseñas son 
            inventadas por esta razón. -->
            <div class="mt-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <p class="text-gray-800 text-sm mb-4">
                            "El pollo asado es de los mejores que he probado. Siempre
                            listo a la hora y con un sabor espectacular." - Laura R.
                        </p>
                        <div class="flex items-center">
                            <div class="text-yellow-500 text-xl">★★★★★</div>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <p class="text-gray-800 text-sm mb-4">
                            "Muy fácil de encargar y todo listo para recoger sin esperas.
                            La costilla estaba jugosa y deliciosa." - Pedro S.
                        </p>
                        <div class="flex items-center">
                            <div class="text-yellow-500 text-xl">★★★★★</div>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <p class="text-gray-800 text-sm mb-4">
                            "Excelente calidad y servicio. Me encanta poder encargar y
                            recoger sin complicaciones." - María G.
                        </p>
                        <div class="flex items-center">
                            <div class="text-yellow-500 text-xl">★★★★☆</div>
                        </div>
                    </div>
                    <div class="bg-white shadow-md p-6 rounded-lg">
                        <p class="text-gray-800 text-sm mb-4">
                            "Los pollos y las costillas son simplemente deliciosos.
                            ¡Perfecto para llevar a casa y disfrutar en familia!" - Juan
                            C.
                        </p>
                        <div class="flex items-center">
                            <div class="text-yellow-500 text-xl">★★★★★</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nuestra carta con las comidas que tenemos y sus precios -->
        <div class="w-full lg:w-1/2 flex justify-center">
            <img src="<?= base_url('img/png/menuBraseiro.png') ?>" alt="Menú de O Braseiro"
                 class="w-full max-w-md rounded-lg shadow-lg" />
        </div>
    </section>
</main>

<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<?= $this->include('templates/footer') ?>