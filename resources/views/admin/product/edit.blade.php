<x-admin-layout>
    <form action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        
        <x-validation-errors class="mb-4"/>
     
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-6 relative">
    <figure>
        <img src="{{ $product->image ? Storage::url($product->image) : 'path/to/default-image.jpg' }}"
        id="imgPreview"
        class="aspect-[16/9] object-cover object-center rounded-lg"
        alt="imagen del producto">
    </figure>
    <div class="absolute top-4 left-4">
        <x-label class="bg-white text-gray-700 py-2 px-2 rounded-lg border-2 border-neon-green cursor-pointer">
            <i class="fa-solid fa-camera text-neon-green"></i>
            Actualizar imagen
            <x-input type="file" accept="image/*" 
            onchange="previewImage(event, '#imgPreview')"
            name="image" class="hidden"/>
        </x-label>
    </div>
</div> 

            <div class="mb-4">
                <x-label>
                    Nombre
                </x-label>
    
                <x-input 
                name="name"
                value="{{ old('name', $product->name) }}"
                class="w-full" 
                placeholder="Escriba el nombre del producto" />
            </div>

            <div class="mb-4">
                <x-label>
                    Descripción
                </x-label>
    
                <textarea
                name="description"
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                placeholder="Escriba la descripción del producto">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-4">
                <x-label>
                    Marca
                </x-label>
                <x-select name="brand_id" class="w-full">
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
                <x-select name="category_id" class="w-full">
                    @foreach ($categories as $category)
                        <option @selected(old('brand_id', $product->category_id) == $category->id) 
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
                class="w-full" 
                placeholder="Escriba la cantidad del producto" />
            </div>
            <div class="mb-4">
                <x-label>
                    Precio
                </x-label>
    
                <x-input 
                name="price"
                value="{{ old('price', $product->price) }}"
                class="w-full" 
                placeholder="Escriba el precio del producto" />
            </div>
            <div class="flex justify-end mt-4">
                <!-- Botón de eliminar -->
               <x-danger-button class="ml-0 mr-2" onclick="deleteProduct()">
                   Eliminar
               </x-danger-button>
               
              <!-- Botón de actualizar -->
              <x-button>
                  Actualizar producto
              </x-button>
          </div>
        </div>
    </form>

<!-- Formulario de eliminación -->
<form action="{{ route('admin.products.destroy', $product) }}" 
     method="POST"
     id="formDelete">
     @csrf
     @method('DELETE')

</form>

@push('js')

 <script>
     function deleteProduct() {
 console.log('Eliminando categoría');
         form = document.getElementById('formDelete');
         form.submit();
     }

 </script>
  
<script>
    function previewImage(event, querySelector){

//Recuperamos el input que desencadeno la acción
const input = event.target;

//Recuperamos la etiqueta img donde cargaremos la imagen
$imgPreview = document.querySelector(querySelector);

// Verificamos si existe una imagen seleccionada
if(!input.files.length) return

//Recuperamos el archivo subido
file = input.files[0];

//Creamos la url
objectURL = URL.createObjectURL(file);

//Modificamos el atributo src de la etiqueta img
$imgPreview.src = objectURL;
            
}
  </script>
@endpush
</x-admin-layout>