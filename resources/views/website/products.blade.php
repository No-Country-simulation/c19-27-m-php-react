<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            <!-- Tarjetas -->
            @foreach ($products as $product)
                <div class="bg-white rounded-sm shadow-md overflow-hidden">
                    <img src="{{ $product->image }}" alt="Imagen" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-bold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700">{{ $product->description }}</p>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-700 font-semibold">${{ $product->price }}</p>
                            <button class="ml-auto text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                <i class="fa-solid fa-cart-shopping w-6 h-6"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <div class="mb-4">
        {{ $products->links() }}
    </div>
    
    <script src="{{ mix('js/app.js') }}"></script>
</x-app-layout>
