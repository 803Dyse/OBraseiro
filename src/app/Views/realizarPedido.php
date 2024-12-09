<?= $this->include('templates/header') ?>

<link rel="stylesheet" href="<?= base_url('css/fondoVanta.css') ?>" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.fog.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div id="vanta-bg"></div>

<main class="mt-8 max-w-7xl mx-auto px-4 py-8">
    <!-- Contenedor de grilla para las secciones -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Barbacoa -->
        <section class="bg-white shadow-lg rounded-lg p-6 text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-4">Barbacoa</h2>
            <ul class="space-y-4">

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Pollo a la brasa</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="10">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Pollo a la brasa</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="5.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Costilla</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="14">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Costilla</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 Dtransition-all" data-price="7">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Alitas de pollo</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="6">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Alitas de pollo</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Chorizo criollo</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="2.20">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Chorizo parrillero</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="2.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Jamón Asado</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="6">
                        Añadir
                    </button>
                </li>
            </ul>
        </section>


        <!-- Acompañamientos -->
        <section class="bg-white shadow-lg rounded-lg p-6 text-center">
            <h2 class="text-3xl font-bold text-red-600 mb-4">Acompañamientos</h2>
            <ul class="space-y-4">

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Alubias negras</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Arroz blanco</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Arroz blanco</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="2">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Patatas fritas</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="2.20">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Patatas asadas</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Ensaladilla</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3.50">
                        Añadir
                    </button>
                </li>
                <!-- Ensalada de pasta -->
                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Ensalada de pasta</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="2.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Ensalada mixta</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="4.00">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Verduras asadas</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3.50">
                        Añadir
                    </button>
                </li>
            </ul>
        </section>

        <!-- Entrantes -->
        <section class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-3xl font-bold text-red-600 mb-4 text-center">Entrantes</h2>
            <ul class="space-y-4">

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Croquetas de pollo</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="6">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Croquetas de pollo</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3.50">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Croquetas de jamón</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="7">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Croquetas de jamón</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="4">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Coxinhas</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="5">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Coxinhas</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Buñuelos de bacalao</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="5">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">1/2 Buñuelos de bacalao</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="3">
                        Añadir
                    </button>
                </li>

                <li class="flex items-center justify-between bg-gray-100 shadow-inner p-4 rounded">
                    <span class="text-gray-800">Risois</span>
                    <button class="add-to-cart bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition-all" data-price="5">
                        Añadir
                    </button>
                </li>

            </ul>
        </section>

    </div>

    <!-- Carrito -->
    <section class="bg-white shadow-lg rounded p-6 max-w-3xl mx-auto mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Carrito</h2>
        <div class="grid grid-cols-5 gap-4">
            <span class="font-semibold text-left pl-2">Unidad</span>
            <span class="font-semibold text-center">Precio Ud.</span>
            <span class="font-semibold text-center">Ítem</span>
            <span class="font-semibold text-center">Precio Total</span>
            <span class="font-semibold text-right pr-2">Acciones</span>
        </div>

        <ul id="cart-items" class="space-y-4 mt-4"></ul>

        <!-- Sección para mostrar el subtotal, IVA y total -->
        <div class="grid grid-cols-3 gap-4 mt-4">
            <span id="subtotal" class="font-semibold text-left pl-2">Subtotal: €0.00</span>
            <span id="iva" class="font-semibold text-center">IVA (10%)</span>
            <span id="total" class="font-semibold text-right pr-2">Total: €0.00</span>
        </div>

        <button id="confirmar-pedido" class="bg-green-500 text-white w-full py-3 mt-4 rounded hover:bg-green-600 transition-all">
            Confirmar Pedido
        </button>
    </section>

</main>

<script src="<?= base_url('js/fondoVanta.js') ?>"></script>

<script>
    const addButtons = document.querySelectorAll('.add-to-cart');
    const cartItems = document.getElementById('cart-items');
    const subtotalDisplay = document.getElementById('subtotal');
    const ivaDisplay = document.getElementById('iva');
    const totalDisplay = document.getElementById('total');
    const cart = {};
    const IVA_RATE = 0.10; // IVA del 10%

    addButtons.forEach(button => {
        button.addEventListener('click', () => {
            const itemName = button.parentElement.querySelector('span').textContent.trim();
            const itemPrice = parseFloat(button.getAttribute('data-price'));

            if (!cart[itemName]) {
                cart[itemName] = {
                    quantity: 0,
                    price: itemPrice
                };
            }
            cart[itemName].quantity++;
            updateCartDisplay();
        });
    });

    function updateCartDisplay() {
        cartItems.innerHTML = '';
        let total = 0;

        for (const [name, item] of Object.entries(cart)) {
            const {
                quantity,
                price
            } = item;
            const itemTotalPrice = quantity * price;
            total += itemTotalPrice;

            const li = document.createElement('li');
            li.className = 'grid grid-cols-5 items-center bg-gray-100 p-4 rounded shadow-inner';
            li.innerHTML = `
            <span>${quantity}</span>
            <span class="text-center">€${price.toFixed(2)}</span>
            <span class="text-center">${name}</span>
            <span class="text-center">€${itemTotalPrice.toFixed(2)}</span>
            <button class="text-red-600 hover:underline text-right remove-item">Eliminar</button>
        `;
            cartItems.appendChild(li);

            li.querySelector('.remove-item').addEventListener('click', () => {
                if (cart[name].quantity > 1) {
                    cart[name].quantity--;
                } else {
                    delete cart[name];
                }
                updateCartDisplay();
            });
        }

        // Calculamos el subtotal (precio sin IVA)
        const subtotal = total - (total * IVA_RATE);

        // Redondeamos los valores
        const subtotalRounded = subtotal.toFixed(2);
        const totalRounded = total.toFixed(2);

        // Mostraramos por fin el subtotal y el total
        subtotalDisplay.textContent = `Subtotal: €${subtotalRounded}`;
        ivaDisplay.textContent = `IVA (10%)`;
        totalDisplay.textContent = `Total: €${totalRounded}`;
    }


    const confirmarPedidoBtn = document.getElementById('confirmar-pedido');

    confirmarPedidoBtn.addEventListener('click', () => {
        if (Object.keys(cart).length === 0) {
            // El carrito está vacío (si intenta hacer un pedido vacio)
            Swal.fire({
                title: 'Carrito Vacío',
                text: 'No has añadido ningún ítem al carrito.',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        } else {
            // El carrito tiene productos (confirmamos todo)
            Swal.fire({
                title: 'Confirmar Pedido',
                text: '¿Deseas confirmar tu pedido?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Realizar Pago',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Aquí rediriges al usuario a "finalizar-compra"
                    // y generas los datos en la base de datos
                    finalizarCompra();
                }
            });
        }
    });

    function finalizarCompra() {
        // Datos del pedido
        const pedidoData = {
            items: cart,
            subtotal: parseFloat(subtotalDisplay.textContent.replace('Subtotal: €', '')),
            total: parseFloat(totalDisplay.textContent.replace('Total: €', '')),
            // Puedes agregar más datos si es necesario
        };

        // Enviamos los datos al servidor
        fetch('<?= base_url('/finalizar-pedido') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify(pedidoData)
        })
                .then(response => {
                    if (response.ok) {
                        // Redirigirimos al usuario a "finalizar-compra"
                        window.location.href = '<?= base_url('/finalizar-compra') ?>';
                    } else {
                        Swal.fire('Error', 'No se pudo procesar el pedido. Intenta de nuevo más tarde.', 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Error', 'Ocurrió un problema al enviar el pedido.', 'error');
                });
    }


</script>

<?= $this->include('templates/footer') ?>