{{-- resources/views/cart/bill.blade.php --}}
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <h1 class="text-2xl font-bold mb-4">Gracias por tu compra</h1>
            <p>Tu pedido ha sido procesado exitosamente.</p>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Detalles del Pedido:</h2>
                @foreach ($bill->products as $product)
                    <div class="flex justify-between mt-2">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="100">
                        <div>
                            <h3>{{ $product->name }}</h3>
                            <p>Cantidad: {{ $product->pivot->quantity }}</p>
                            <p>Precio: ${{ $product->pivot->price }}</p>
                            <p>Subtotal: ${{ $product->pivot->subtotal }}</p>
                        </div>
                    </div>
                @endforeach
                <h3 class="text-lg font-bold">Total: ${{ $bill->total }}</h3>
            </div>
            <a href="{{ route('user.list') }}" class="mt-4 inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded">Volver a la tienda</a>
        </div>
    </div>
</x-app-layout>

