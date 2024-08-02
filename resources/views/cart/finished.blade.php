
<x-app-layout>
<div class="container mx-auto p-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <h1 class="text-2xl font-bold mb-4">Gracias por tu compra</h1>
            <p>Tu pedido ha sido procesado exitosamente.</p>
            <div class="mt-4">
                <h2 class="text-xl font-semibold">Detalles del Pedido:</h2>
                @foreach ($bill->products as $product)
                    <div class="flex justify-start mt-2">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="200" height="400">
                        <div>
                            <h3 class="text-3xl font-semibold">{{ $product->name }}</h3>
                            <p><strong>Descripción:</strong>{{ $product->description }}</p>
                            <p><strong>Marca:</strong> {{ $product->brand->name }}</p>
                            <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
                            <p><strong>Precio:</strong> ${{ $product->pivot->price }}</p>
                            <p><strong>Cantidad:</strong> {{ $product->pivot->quantity }}</p>
                            <p><strong>Subtotal:</strong> ${{ $product->pivot->subtotal }}</p>
                        </div>
                    </div>
                @endforeach
                <h3 class="text-lg font-bold">Total: ${{ $bill->total }}</h3>
            </div>
            <a href="{{ route('website.products') }}" class="mt-4 inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded">Volver a la tienda</a>
        </div>
    </div>
</div>
</x-app-layout>

