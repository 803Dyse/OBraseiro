<?= $this->include('templates/header') ?>

<!-- Main content aqui -->
<main class="max-w-7xl mx-auto px-4 py-8 text-black">
    <h1 class="text-3xl font-bold text-center mb-6 underline">
        Realizar Pedido
    </h1>
    <form id="pedido-form">
        <!-- Sección de Carnes a la Brasa -->
        <h2 class="text-xl font-semibold mb-4">Carnes a la Brasa</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Pollo a la brasa -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Pollo a la brasa</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="pollo_brasa" class="mr-2">Raciones:</label>
                    <select
                        id="pollo_brasa"
                        name="pollo_brasa"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1/2_racion">1/2 Ración - 5,50€</option>
                        <option value="1_racion">1 Ración - 10,00€</option>
                    </select>
                </div>
            </div>
            <!-- Costilla -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Costilla</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="costilla" class="mr-2">Raciones:</label>
                    <select id="costilla" name="costilla" class="border px-2 py-1">
                        <option value="0">0</option>
                        <option value="1_kg">1 kg - 24,00€/kg</option>
                    </select>
                </div>
            </div>
            <!-- Alitas de pollo -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Alitas de pollo</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="alitas_pollo" class="mr-2">Raciones:</label>
                    <select
                        id="alitas_pollo"
                        name="alitas_pollo"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1/2_racion">1/2 Ración - 3,00€</option>
                        <option value="1_racion">1 Ración - 6,00€</option>
                    </select>
                </div>
            </div>
            <!-- Chorizo criollo -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Chorizo criollo</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="chorizo_criollo" class="mr-2">Raciones:</label>
                    <select
                        id="chorizo_criollo"
                        name="chorizo_criollo"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 2,20€</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Sección de Acompañamientos -->
        <h2 class="text-xl font-semibold mb-4">Acompañamientos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Frijoles negros -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Alubias negras (feijão)</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="frijoles_negros" class="mr-2">Raciones:</label>
                    <select
                        id="frijoles_negros"
                        name="frijoles_negros"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
            <!-- Arroz blanco -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Arroz blanco</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="arroz_blanco" class="mr-2">Raciones:</label>
                    <select
                        id="arroz_blanco"
                        name="arroz_blanco"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 2,00€</option>
                    </select>
                </div>
            </div>
            <!-- Patatas fritas -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Patatas fritas</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="patatas_fritas" class="mr-2">Raciones:</label>
                    <select
                        id="patatas_fritas"
                        name="patatas_fritas"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 2,20€</option>
                    </select>
                </div>
            </div>
            <!-- Patatas asadas -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Patatas asadas (ao murro)</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="patatas_asadas" class="mr-2">Raciones:</label>
                    <select
                        id="patatas_asadas"
                        name="patatas_asadas"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
            <!-- Ensaladilla -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Ensaladilla</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="ensaladilla" class="mr-2">Raciones:</label>
                    <select
                        id="ensaladilla"
                        name="ensaladilla"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
            <!-- Ensalada mixta -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Ensalada mixta</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="ensalada_mixta" class="mr-2">Raciones:</label>
                    <select
                        id="ensalada_mixta"
                        name="ensalada_mixta"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 4,00€</option>
                    </select>
                </div>
            </div>
            <!-- Verduras asadas -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Verduras asadas</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="verduras_asadas" class="mr-2">Raciones:</label>
                    <select
                        id="verduras_asadas"
                        name="verduras_asadas"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Sección de Entrantes -->
        <h2 class="text-xl font-semibold mb-4">Entrantes</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Croquetas de pollo -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Croquetas de pollo (6 ud)</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="croquetas_pollo" class="mr-2">Raciones:</label>
                    <select
                        id="croquetas_pollo"
                        name="croquetas_pollo"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="6_ud">6 unidades - 3,50€</option>
                        <option value="12_ud">12 unidades - 6,00€</option>
                    </select>
                </div>
            </div>
            <!-- Croquetas de jamón -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Croquetas de jamón (8 ud)</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="croquetas_jamon" class="mr-2">Raciones:</label>
                    <select
                        id="croquetas_jamon"
                        name="croquetas_jamon"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="8_ud">8 unidades - 4,00€</option>
                        <option value="16_ud">16 unidades - 7,00€</option>
                    </select>
                </div>
            </div>
            <!-- Buñuelos de bacalao -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Buñuelos de bacalao (8 ud)</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="bunuelos_bacalao" class="mr-2">Raciones:</label>
                    <select
                        id="bunuelos_bacalao"
                        name="bunuelos_bacalao"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="8_ud">8 unidades - 3,00€</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Sección de Postres -->
        <h2 class="text-xl font-semibold mb-4">Postres</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Tiramisú -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Tiramisú</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="tiramisu" class="mr-2">Raciones:</label>
                    <select id="tiramisu" name="tiramisu" class="border px-2 py-1">
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
            <!-- Tarta de la abuela -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h2 class="text-lg font-semibold">Tarta de la abuela</h2>
                <div class="flex items-center justify-between mt-2">
                    <label for="tarta_abuela" class="mr-2">Raciones:</label>
                    <select
                        id="tarta_abuela"
                        name="tarta_abuela"
                        class="border px-2 py-1"
                        >
                        <option value="0">0</option>
                        <option value="1_racion">1 Ración - 3,50€</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <div id="carrito" class="bg-zinc-900 p-6 mt-8 rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4 text-white">Tu Carrito</h2>
        <div id="carrito-items" class="space-y-4">
            <!-- Aquí se van agregando los elementos seleccionados por el usuario -->
            <p id="carrito-vacio" class="text-gray-400">Tu carrito está vacío.</p>
        </div>
        <div class="mt-6 text-center">
            <button
                type="button"
                class="bg-red-600 text-white font-bold py-2 px-4 rounded-md hover:bg-red-700 transition-all duration-300"
                >
                Realizar Pedido
            </button>
        </div>
    </div>
</main>

<?= $this->include('templates/footer') ?>