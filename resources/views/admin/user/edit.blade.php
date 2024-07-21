<x-admin-layout>

        
        <!-- Formulario de actualización -->
        <form action="{{ route('admin.users.update', $user) }}" 
        method="POST"
        >
        @csrf
        @method('PUT')
        <!-- Campos del formulario de actualización -->
        <x-validation-errors class="mb-4"/>
     
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">

            <h1 class="text-xl text-gray-700 font-bold mb-4">Datos del usuario</h1>
            <x-label class="mb-2">
             Nombre
            </x-label>
            <x-input
            name="name" 
             class="block mt-1 w-full"
             placeholder="Ingrese el nombre"
             value="{{ $user->name }}"/>

             <x-label class="mb-2 mt-2">
                Email
               </x-label>
               <x-input
               name="email" 
                class="block mt-1 w-full"
                placeholder="Ingrese el email"
                value="{{ $user->email }}"/>
            
                <x-label class="mb-2 mt-2">
                    Número de celular
                   </x-label>
                   <x-input
                   name="phone_number" 
                    class="block mt-1 w-full"
                    placeholder="Ingrese el número de celular"
                    value="{{ $user->phone_number }}"/>
        </div>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-xl text-gray-700 font-bold mb-4">Dirección del usuario</h1>

            <x-label class="mb-2 mt-2">
                Dirección
               </x-label>
               <x-input
               name="address" 
                class="block mt-1 w-full"
                placeholder="Ingrese la dirección"
                value="{{ $user->address }}"/>

                <x-label class="mb-2 mt-2">
                    Calle
                   </x-label>
                   <x-input
                   name="street" 
                    class="block mt-1 w-full"
                    placeholder="Ingrese la dirección"
                    value="{{ $user->street }}"/>

                    <x-label class="mb-2 mt-2">
                        Número de casa o depto
                       </x-label>
                       <x-input
                       name="house_number" 
                        class="block mt-1 w-full"
                        placeholder="Ingrese el n° de casa o depto"
                        value="{{ $user->house_number }}"/>

                    <x-label class="mb-2 mt-2">
                        Códigi postal
                       </x-label>
                       <x-input
                       name="postal_code" 
                        class="block mt-1 w-full"
                        placeholder="Ingrese el código postal"
                        value="{{ $user->postal_code }}"/>

                        <x-label class="mb-2 mt-2">
                            Ciudad
                           </x-label>
                           <x-input
                           name="city" 
                            class="block mt-1 w-full"
                            placeholder="Ingrese la ciudad"
                            value="{{ $user->city }}"/>
                    
                            <x-label class="mb-2 mt-2">
                                Provincia
                               </x-label>
                               <x-input
                               name="state" 
                                class="block mt-1 w-full"
                                placeholder="Ingrese la provincia"
                                value="{{ $user->state }}"/>        
        </div>
     
        <div class="flex items-center justify-end mt-4">
              <!-- Botón de eliminar -->
             <x-danger-button class="mr-2" onclick="deleteCategory()">
                 Eliminar
             </x-danger-button>
             
            <!-- Botón de actualizar -->
            <x-button>
                Actualizar
            </x-button>
        </div>
     
        </form>
        <!-- Formulario de eliminación -->
        <form action="{{ route('admin.users.destroy', $user) }}" 
             method="POST"
             id="formDelete">
             @csrf
             @method('DELETE')
     
        </form>
        
        @push('js')
     
         <script>
             function deleteCategory() {
       
                 form = document.getElementById('formDelete');
                 form.submit();
             }
     
         </script>
            
        @endpush
</x-admin-layout>