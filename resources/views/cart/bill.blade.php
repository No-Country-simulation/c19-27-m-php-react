<x-app-layout>
    <div class="container mx-auto px-4 py-8">
      
        <div class="bg-white p-4 rounded-lg shadow-md">
            {{-- <h2 class="text-xl font-semibold mb-2">Detalles de la Factura</h2> --}}
            <div class="flex justify-between">
              <img src="{{ asset('theme-admin/img/logo-type.png') }}" class="w-25 h-16" alt="">
              <div class="ml-4">
                 <p class="text-lg font-semibold">GigaStore</p>
                 <p class="text-sm"><strong>Dirección:</strong>Calle Falsa 123, Ciudad Innovación, 20093</p> 
                 <p class="text-sm"><strong>Tel:</strong> (123) 456-7890 </p>
                 <p class="text-sm"><strong>Email:</strong> gigastoreD@example.com</p>
                 <p class="text-sm"><strong>Sitio web:</strong> www.gigastore.com</p>
                 <p><strong>NIF:</strong> A12345678</p>
              
              </div>
            </div>
            <hr class="mb-4 ">
            <h5 class="text-lg font-semibold">Datos del Cliente</h5>
            <p><strong>Nombre:</strong> {{ $bill->user->name }}</p>
            <p><strong>Email:</strong> {{ $bill->user->email }}</p>
            <p><strong>Dirección:</strong> {{ $bill->user->address }}</p>
            <hr class="mb-4">
            <p><strong>ID de Factura:</strong> {{ $bill->id }}</p>
            <p><strong>Fecha:</strong> {{ $bill->date }}</p>
            <p><strong>Total:</strong> ${{ number_format($bill->total, 2) }}</p>
            <hr class="mb-4">
            <h3 class="text-lg font-semibold mt-4 mb-2">Productos:</h3>
            <ul class="list-disc pl-5">
                @foreach($bill->products as $product)
                    <li class="mb-4">
                        <strong>{{ $product->name }}</strong>
                        <br>
                        - Descripción: {{ $product->description }}
                        <br>
                        - Marca: {{ $product->brand->name }}
                        <br>
                        - Categoría: {{ $product->category->name }}
                        <br>
                        - Cantidad: {{ $product->pivot->quantity }}
                        <br>
                        - Subtotal: ${{ number_format($product->pivot->subtotal, 2) }}
                    </li>
                    <hr class="mb-4">
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
