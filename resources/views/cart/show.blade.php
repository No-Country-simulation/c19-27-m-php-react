<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2">
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
                                        <img src="{{ $product->image }}" alt="Imagen" class="w-32 h-32 object-cover rounded-lg mr-4">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                                            <p class="text-gray-700 price" data-price="{{ $product->price }}">${{ number_format($product->price, 2) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <form method="POST" action="{{ route('cart.uOr', $product->id) }}" class="flex items-center">
                                            @csrf
                                            <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="button" class="bg-gray-200 text-gray-600 p-2 rounded-l decrement-btn">-</button>
                                            <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1" max="20" class="quantity-input w-16 text-center border-none" readonly>
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
                    <a href="{{ route('website.products') }}" class="bg-blue-500 text-white font-bold py-2 rounded w-full mt-4 text-center block">Seguir comprando</a>
                    <button class="bg-blue-500 text-white font-bold py-2 rounded w-full mt-2">Continuar compra</button>
                </div>
            </div>
        </div>

        <!-- Recomendaciones de productos -->
<div class="mt-8">
    <h2 class="text-xl font-semibold mb-4">Recomendaciones para ti</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($recommendedProducts as $product)
            <div class="bg-white rounded-sm shadow-md overflow-hidden">
                <a href="#">
                    <img class="p-2 rounded-t-lg" src="{{ $product->image }}" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                    </a>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <div class="flex items-center justify-between mt-2.5 mb-5">
                        <span class="text-lg font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-3 h-3 text-gray-200 dark:text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="btn btn-success" onclick="addToCart({{ $product->id }})" style="border-radius: 6px; background: #007BFF; color:white; width: 157.355px; height: 31.857px;">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
                const $input = $(this).prev('.quantity-input');
                let value = parseInt($input.val());
                if (value < 20) {
                    value++;
                    $input.val(value);
                    updateTotalPrice();
                }
            });

            $('.decrement-btn').click(function() {
                const $input = $(this).next('.quantity-input');
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
</x-app-layout>


