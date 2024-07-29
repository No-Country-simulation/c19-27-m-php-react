<x-app-layout>

    <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

            <form action="{{ route('website.products') }}" method="GET">
                <div class="bg-white p-4 rounded-sm shadow-md">
                    <h2 class="text-lg font-bold mb-4" style="color: #C4C4C4;">Resultados ({{ $productCount }})</h2>
                    <br>
                    <h2 class="text-lg mb-4">Envío gratis</h2>
                    <h4 class="mb-4">En productos seleccionados por compras desde $149.990</h4>
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
            </form>
            
                <div class="lg:col-span-3">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">

                        @forelse ($products as $product)
                        

<div class="bg-white rounded-sm shadow-md overflow-hidden">
    <a href="#">
        <img class="p-2 rounded-t-lg" src="{{ $product->image }}" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
        </a>
        <p class="text-gray-700">{{ $product->description }}</p>
        <div class="flex items-center justify-between mt-2.5 mb-5">
            <span class="text-lg font-bold text-gray-900 dark:text-white">${{ $product->price }}</span>
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-3 h-3 text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <svg class="w-3 h-3 text-gray-200 dark:text-neon-green" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <button class="btn btn-success" onclick="addToCart({{ $product->id }})" style="border-radius: 6px; background: #007BFF; color:white; width: 157.355px; height: 31.857px;">Agregar al carrito</button>
        </div>
    </div>
</div>

                           

                        @empty
                            <div class="container text-center" style="margin-left: 10rem;">
                                <div class="row">
                                    <div class="col-6 col-md-4 mx-auto mt-35">
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
        
    </div>

    <form id="cart-form" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="product_id" id="product_id">
    </form>
    
    

    <div class="mb-4">
        {{ $products->links() }}
    </div> 

    <script src="{{ mix('js/app.js') }}"></script>

    <script>
        function addToCart(productId) {
            // Actualiza el campo oculto del formulario con el ID del producto
            document.getElementById('product_id').value = productId;
    
            // Actualiza la acción del formulario con el ID del producto
            var form = document.getElementById('cart-form');
            var actionUrl = "{{ url('cart/add') }}/" + productId;
            form.action = actionUrl;
    
            // Envía el formulario
            form.submit();
        }
    </script>
    
</x-app-layout>
