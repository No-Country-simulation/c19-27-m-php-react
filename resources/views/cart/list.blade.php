<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            <!-- Tarjetas -->
            @foreach ($products as $product)
            <div class="bg-white rounded-sm shadow-md overflow-hidden">
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" >
                <div class="p-4">
                    <h2 class="text-lg font-bold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <h2 class="text-lg font-bold mb-2">{{ $product->quantity }}</h2>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-700 font-semibold">${{ $product->price }}</p>
                        <form  action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                            @csrf
                            <button class="ml-auto text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                <i class="fa-solid fa-cart-shopping w-6 h-6"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <script src="{{ mix('js/app.js') }}"></script>


<div class="mb-4">
    {{ $products->links() }}
</div>
</x-app-layout>
