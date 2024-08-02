<x-app-layout>
<div class="progress-container">
        <div class="progress">
            <div class="progress-step">
                <div class="circle">1</div>
                <div class="label">Información</div>
            </div>
            <div class="progress-step">
                <div class="circle">2</div>
                <div class="label">Dirección de envío</div>
            </div>
            <div class="progress-step">
                <div class="circle">3</div>
                <div class="label">Método de envío</div>
            </div>
            <div class="progress-step">
                <div class="circle">4</div>
                <div class="label">Forma de pago</div>
            </div>
            <div class="progress-step">
                <div class="circle">5</div>
                <div class="label">Revisión y aprobación</div>
            </div>
        </div>
    </div>
    <div class="notification">
        <div class="icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="message">
            El correo ya se encuentra registrado, se ha completado el formulario automáticamente con tus datos.
        </div>
    </div>
    <div class="container mx-auto px-4 py-8 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2 hidden">
                <div class="flex items-center mb-2">
                    <h2 class="text-xl font-semibold">Carrito:</h2>
                    <span class="text-gray-700 ml-2">(<span class="total-quantity">{{ $products->sum('pivot.quantity') }}</span>)</span>
                </div>
                @if(isset($products) && $products->isNotEmpty())
                    <ul class="bg-white shadow rounded-lg p-4">
                        @foreach($products as $product)
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <img src="{{ $product->image ? Storage::url($product->image) : 'path/to/default-image.jpg' }}" alt="Imagen" class="w-32 h-32 object-cover rounded-lg mr-4">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                            <p class="text-gray-700 price" data-price="{{ $product->price }}">${{ number_format($product->price, 2) }}</p>
                                            <h3 class="text-lg font-semibold">Disponible:{{ $product->quantity }}</h3>

                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <form method="POST" action="{{ route('cart.uOr', $product->id) }}" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" name="action" value="update" class="bg-blue-500 text-white p-2 mr-2 rounded">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                            <button type="button" class="bg-gray-200 text-gray-600 p-2 rounded-l decrement-btn">-</button>
                                            <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1" max="{{ $product->quantity }}" class="quantity-input w-12 text-center border-none" readonly>
                                            <button type="button" class="bg-gray-200 text-gray-600 p-2 rounded-r increment-btn">+</button>
                                            <button type="submit" name="action" value="remove" class="bg-red-500 text-white p-2 ml-2 rounded">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">No hay productos en el carrito</h2>
                    </div>
                @endif
            </div>

            <div class="col-span-2">
                    <ul class="bg-white shadow rounded-lg p-4">
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-lg font-semibold" style="font-size:35px; margin-bottom:9rem;">Tus datos</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3">
                                {{-- <h3 class="text-lg mt-3"></h3> --}}
                                <a href="{{ route('client.profiles.edit' ) }}" class="text-lg">Editar tus datos</a>
                            </li>
                    </ul> 
            </div>
            
            
            <div class="col-span-1">
                <h2 class="text-xl font-semibold mb-2">Resumen de la orden</h2>
                <div class="bg-white p-4 rounded-lg shadow-md top-4">
                    <div class="border-b pb-2 mb-2">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Productos (<span class="total-quantity">{{ $products->sum('pivot.quantity') }}</span>)</span>
                            <span class="text-gray-700 total-price">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    <div class="border-b pb-2 mb-2">
                        <div class="flex justify-between">
                            <span class="font-semibold text-gray-900">Total:</span>
                            <span class="font-semibold text-gray-900 total-price">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                    <a href="{{ route('website.products') }}" class="bg-blue-500 text-white font-bold py-2 rounded w-full mt-4 text-center block">Editar la compra</a>
                    <a href="{{ route('cart.finished') }}" class="bg-blue-500 text-white font-bold py-2 rounded w-full mt-4 text-center block">Finalizar compra</a>
                </div>
            </div>

            <div class="col-span-2" style="top:-3rem;">
                    <ul class="bg-white shadow rounded-lg p-4">
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-lg font-semibold" style="font-size:35px; margin-bottom:9rem;">Direccion de envío</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-lg mt-3">Editar tus datos</h3>
                            </li>
                    </ul> 
            </div>
            <div class="col-span-2">
                    <ul class="bg-white shadow rounded-lg p-4">
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-lg font-semibold" style="font-size:35px; margin-bottom:9rem;">Método de envío</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-lg mt-3">Editar tus datos</h3>
                            </li>
                    </ul> 
            </div>
            <div class="col-span-2">
                    <ul class="bg-white shadow rounded-lg p-4">
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-lg font-semibold" style="font-size:35px; margin-bottom:9rem;">Forma de Pago</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-lg mt-3">Editar tus datos</h3>
                            </li>
                    </ul> 
            </div>
            <div class="col-span-2">
                    <ul class="bg-white shadow rounded-lg p-4">
                            <li class="border-b border-gray-200 py-4">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div>
                                            <h1 class="text-lg font-semibold" style="font-size:35px; margin-bottom:9rem;">Revisión y aprobación</h1>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 class="text-lg mt-3">Editar tus datos</h3>
                            </li>
                    </ul> 
            </div>
        </div>



    <form id="cart-form" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="product_id" id="product_id">
    </form>
</div>

    </div>

    <script>
   $(document).ready(function() {
    function updateTotalPrice() {
        let total = 0;
        let totalQuantity = 0;
        $('.quantity-input').each(function() {
            const quantity = parseInt($(this).val());
            const price = parseFloat($(this).closest('li').find('.price').data('price'));
            if (!isNaN(quantity) && !isNaN(price)) {
                total += quantity * price;
                totalQuantity += quantity;
            }
        });
        $('.total-price').text('$' + total.toFixed(2));
        $('.total-quantity').text(totalQuantity + ' productos');
    }

    $('.increment-btn').click(function() {
        const $input = $(this).siblings('.quantity-input');
        const maxQuantity = parseInt($input.attr('max'));
        let value = parseInt($input.val());
        if (value < maxQuantity) {
            value++;
            $input.val(value);
            updateTotalPrice();
        }
    });

    $('.decrement-btn').click(function() {
        const $input = $(this).siblings('.quantity-input');
        let value = parseInt($input.val());
        if (value > 1) {
            value--;
            $input.val(value);
            updateTotalPrice();
        }
    });

    // Inicializar el precio total en la carga de la página
    updateTotalPrice();
});
    </script>
     <script>
        function addToCart(productId) {
            // Actualiza el campo oculto del formulario con el ID del producto
            document.getElementById('product_id').value = productId;
    
            // Actualiza la acción del formulario con el ID del producto
            var form = document.getElementById('cart-form');
            var actionUrl = "{{ url('cart/add') }}/" + productId;
            form.action = actionUrl;
    
            // Envía el formulario
            form.submit();
        }
    </script>
</x-app-layout>


