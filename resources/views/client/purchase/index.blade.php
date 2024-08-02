<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <h1 class="text-2xl font-bold mb-4">Mis Compras</h1>

            @if($bills->isEmpty())
                <p>No has realizado compras todavía.</p>
            @else
                @foreach ($bills as $bill)
                    <div class="mt-6 border-b border-gray-200 pb-4">
                        <h2 class="text-xl font-semibold">Factura #{{ $bill->id }}</h2>
                        <p>Fecha: {{ $bill->date->format('d/m/Y') }}</p>
                        <p>Total: ${{ number_format($bill->total, 2) }}</p>

                        <h3 class="text-lg font-bold mt-2">Productos:</h3>
                        <ul>
                            @foreach ($bill->products as $product)
                                <li class="mt-4">
                                    <div class="flex items-center">
                                        <img src="{{ $product->image ? Storage::url($product->image) : 'path/to/default-image.jpg' }}" class="w-40 h-60 object-cover object-center rounded-lg mr-4" alt="">
                                        <div>
                                            <h4 class="font-semibold text-3xl">{{ $product->name }}</h4>
                                            <p><strong>Descripción:</strong>{{ $product->description }}</p>
                                            <p><strong>Marca:</strong> {{ $product->brand->name }}</p>
                                            <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
                                            <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                                            <p><strong>Cantidad:</strong> {{ $product->pivot->quantity }}</p>
                                            <p><strong>Subtotal:</strong> ${{ number_format($product->pivot->subtotal, 2) }}</p>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
