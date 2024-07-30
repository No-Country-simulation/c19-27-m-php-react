<x-admin-layout>
     
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-6 rounded">
                <figure>
                    <img src="{{ $product->image ? Storage::url($product->image) : 'path/to/default-image.jpg' }}"
                    class="aspect-[14/8] object-cover object-center rounded-lg"
                    alt="imagen del producto">
                </figure>
            </div> 

            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
    
                <x-input 
                name="name"
                value="{{ old('name', $product->name) }}"
                disabled
                class="block mt-1 w-full bg-slate-100 text-gray-500" 
                placeholder="Escriba el nombre del producto" />
            </div>

            <div class="mb-4">
                <x-label>
                    Descripción
                </x-label>
    
                <textarea
                name="description"
                disabled
                class="w-full bg-slate-100 border-gray-300 text-gray-500 rounded-md shadow-sm" 
                placeholder="Escriba la descripción del producto">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <x-label>
                    Marca
                </x-label>
                <x-select name="brand_id" class="block mt-1 w-full bg-slate-100 text-gray-900" disabled>
                    @foreach ($brands as $brand)
                        <option @selected(old('brand_id', $product->brand_id) == $brand->id) 
                            value="{{ $brand->id }}">
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Categoría
                </x-label>
                <x-select name="category_id" class="block mt-1 w-full bg-slate-100"  disabled>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id', $product->category_id) == $category->id) 
                            value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select>
                
            </div>
            <div class="mb-4">
                <x-label>
                    Cantidad
                </x-label>
    
                <x-input 
                name="quantity"
                value="{{ old('quantity', $product->quantity) }}"
                disabled
                class="block mt-1 w-full bg-slate-100 text-gray-500" 
                placeholder="Escriba la cantidad del producto" />
            </div>
            <div class="mb-4">
                <x-label>
                    Precio
                </x-label>
    
                <x-input 
                name="price"
                value="{{ old('price', $product->price) }}"
                disabled
                class="block mt-1 w-full bg-slate-100 text-gray-500" 
                placeholder="Escriba el precio del producto" />
            </div>
            <div class="flex justify-end mt-4">
               
              <!-- Botón de volver -->
              <x-button>
                  <a href="{{ route('admin.products.index') }}">volver</a>
              </x-button>
          </div>
        </div>
    
</x-admin-layout>
