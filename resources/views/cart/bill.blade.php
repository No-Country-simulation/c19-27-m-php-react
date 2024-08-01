<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold mb-4">Factura</h1>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">Detalles de la Factura</h2>
            <p><strong>ID de Factura:</strong> {{ $bill->id }}</p>
            <p><strong>Fecha:</strong> {{ $bill->date }}</p>
            <p><strong>Total:</strong> ${{ number_format($bill->total, 2) }}</p>
            <h3 class="text-lg font-semibold mt-4 mb-2">Productos:</h3>
            <ul class="list-disc pl-5">
                @foreach($bill->products as $product)
                    <li>
                        <strong>{{ $product->name }}</strong>
                        - Cantidad: {{ $product->pivot->quantity }}
                        - Subtotal: ${{ number_format($product->pivot->subtotal, 2) }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
