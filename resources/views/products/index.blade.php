<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-6 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            <!-- Tarjetas -->
            @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src={{ $product->image }} alt="Imagen" class="w-50 h-30 object-cover">
                <div class="p-4">
                    <h2 class="text-sl font-bold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <p class="text-gray-700 font-semibold">${{ $product->price }}</p>
                </div>
            </div>
            @endforeach
           
    </div>
    
    <script src="{{ mix('js/app.js') }}"></script>


{{-- <div class="grid grid-cols-6 grid-rows-2 gap-4">
    
    @foreach ($products as $product)
    <img class ="w-28 h-20" src="{{ $product->image }}" alt="">
    <h1 class="text-sm font-bold">{{ $product->name }}</h1>
    <p class="text-xs">
        {{ $product->description }}
    </p>
    

    @endforeach

</div> --}}
</x-app-layout>