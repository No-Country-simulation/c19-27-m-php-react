<x-app-layout>

    <div class="container mx-auto p-4">
        <form action="{{ route('website.products') }}" method="GET">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
                <!-- Filtros -->
                <div class="bg-white p-4 rounded-sm shadow-md">
                    <h2 class="text-lg font-bold mb-4" style="color: #C4C4C4;">Resultados ({{ $productCount }})</h2>
                    <br>
                    <h2 class="text-lg mb-4">Envío gratis</h2>
                    <h4 class="mb-4">En productos seleccionados
                    por compras desde $149.990</h4>
                   
                    <h5>Retiro en un punto</h5>
                    <br>
                    <div class="mb-4">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" type="button" class="w-full flex justify-between items-center text-gray-700 font-semibold py-2 border-b">
                                Categorías
                                <svg :class="{'transform rotate-180': open}" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                            <div x-show="open" class="mt-2">
                                @foreach ($categories as $category)
                                    <label class="block text-gray-700">
                                        <input type="checkbox" name="category[]" value="{{ $category->id }}" class="mr-2"> {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div x-data="{ open: false }">
                        <button @click="open = !open" type="button" class="w-full flex justify-between items-center text-gray-700 font-semibold py-2 border-b">
                            Marcas
                            <svg :class="{'transform rotate-180': open}" class="w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="open" class="mt-2">
                            @foreach ($brands as $brand)
                                <label class="block text-gray-700">
                                    <input type="checkbox" name="brand[]" value="{{ $brand->id }}" class="mr-2"> {{ $brand->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Aplicar Filtros</button>
                </div>


                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($products as $product)
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
                        @empty
                            <div class="container text-center" style="margin-left: 10rem;">
                                <div class="row">
                                    <div class="col-6 col-md-4 mx-auto mt-40">
                                        <div class="card" style="width: 18rem;">
                                            <i class="fas fa-times" style="color:red; font-size:7rem;"></i>
                                            <br>
                                            <h1 style="font-size:3.5rem;">No se encontraron productos</h1>
                                        </div>                         
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                    
                </div>
            </div>
        </form>
    </div>

    <div class="mb-4">
        {{ $products->links() }}
    </div> 

    <script src="{{ mix('js/app.js') }}"></script>
</x-app-layout>
