<x-admin-layout>
    <!-- Formulario de actualización -->
    <form action="{{ route('admin.permissions.update', $permission) }}" 
   method="POST"
   class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
   @csrf
   @method('PUT')
   <!-- Campos del formulario de actualización -->
   <x-validation-errors class="mb-4"/>

   <div class="mb-4">
       <x-label class="mb-2">
        Nombre
       </x-label>
       <x-input
       name="name" 
        class="block mt-1 w-full"
        placeholder="Escriba el nombre del permiso"
        value="{{ old('name', $permission->name) }}"/>
   </div>

   <div class="flex mt-4">
         <!-- Botón de eliminar -->
        <x-danger-button class="ml-0 mr-2" onclick="deletePermission()">
            Eliminar
        </x-danger-button>
        
       <!-- Botón de actualizar -->
       <x-button>
           Actualizar
       </x-button>
   </div>

   </form>
   <!-- Formulario de eliminación -->
   <form action="{{ route('admin.permissions.destroy', $permission) }}" 
        method="POST"
        id="formDelete">
        @csrf
        @method('DELETE')

   </form>
   
   @push('js')

    <script>
        function deletePermission() {
           
            form = document.getElementById('formDelete');
            form.submit();
        }

    </script>
       
   @endpush
</x-admin-layout>