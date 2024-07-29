
<x-app-layout>
   <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>

        <div class="container">
            <div class="grid  grid-cols-2">
                <div class="card bg-slate-400">
                    hola
                </div>
                <div>

                </div>

            </div>
            @if(isset($products) && $products->isNotEmpty())
                <h2 class="text-xl font-semibold mb-2">Productos en tu carrito:</h2>
                <ul class="bg-white shadow rounded-lg p-4">
                    @foreach($products as $product)
                        <li class="border-b border-gray-200 py-2">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold">{{$product->name}}</h3>
                                    <img src="{{ $product->image }}" alt="Imagen" class="w-full h-48 object-cover">
                                    </form>
                                </div>
                                <div class="text-center">
                                    <form method="POST" action="{{ route('cart.uOr', $product->id) }}"  class="flex items-center">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <p class="text-gray-600" style="padding-right: 10px">Cantidad:    </p>
                                        <input type="number" name="quantity" value="{{ $product->pivot->quantity }}" min="1" class="w-16 text-center border border-gray-300 rounded">
                                        <button type="submit" name="action" value="update" class="ml-2 bg-blue-500 text-white px-2 py-1 rounded">Actualizar</button>
                                        <button type="submit" name="action" value="remove" class="ml-2 bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                                </div>
                                <div class="text-right">
                                    <span class="text-gray-800 font-bold">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    <div class=" text-right bg-white shadow rounded-lg p-4">
                        <h2 class="text-xl font-semibold mb-2">Total:{{number_format($total,2) }}</h2>
                    </div>
                </ul>
            @else
                <div class="bg-white shadow rounded-lg p-4">
                    <h2 class="text-xl font-semibold mb-2">No hay productos en el carrito</h2>
                </div>
            @endif
        </div>
  

</x-app-layout>
