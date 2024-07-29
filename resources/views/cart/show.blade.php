<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2">
                @if(isset($products) && $products->isNotEmpty())
                    <h2 class="text-xl font-semibold mb-2">Productos en tu carrito</h2>
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
                <h2 class="text-xl font-semibold mb-2">Productos en tu carrito</h2>
                <div class="bg-white p-4 rounded-lg shadow-md top-4">
                    <div class="border-b pb-2 mb-2">
                        <div class="flex justify-between">
                            <span class="text-gray-700">Productos ({{ $products->count() }})</span>
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
    </div>

    <script>
        $(document).ready(function() {
            function updateTotalPrice() {
                let total = 0;
                $('.quantity-input').each(function() {
                    const quantity = parseInt($(this).val());
                    const price = parseFloat($(this).closest('li').find('.price').data('price'));
                    if (!isNaN(quantity) && !isNaN(price)) {
                        total += quantity * price;
                    }
                });
                $('.total-price').text('$' + total.toFixed(2));
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

            // Deshabilitar el borde del input
            $('.quantity-input').css('border', 'none');

            // Inicializar el precio total en la carga de la página
            updateTotalPrice();
        });
    </script>

   
</x-app-layout>

