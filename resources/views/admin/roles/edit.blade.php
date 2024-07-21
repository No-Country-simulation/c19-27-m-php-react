<x-admin-layout>
    <!-- Formulario de actualización -->
    <form action="{{ route('admin.roles.update', $role) }}" 
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
        placeholder="Escriba el nombre del rol"
        value="{{ $role->name }}"/>
   </div>

   <div class="flex items-center justify-end mt-4">
         <!-- Botón de eliminar -->
        <x-danger-button class="mr-2" onclick="deleteRole()">
            Eliminar
        </x-danger-button>
        
       <!-- Botón de actualizar -->
       <x-button>
           Actualizar rol
       </x-button>
   </div>

   </form>
   <!-- Formulario de eliminación -->
   <form action="{{ route('admin.roles.destroy', $role) }}" 
        method="POST"
        id="formDelete">
        @csrf
        @method('DELETE')

   </form>
   
   @push('js')

    <script>
        function deleteRole() {
           
            form = document.getElementById('formDelete');
            form.submit();
        }

    </script>
       
   @endpush
</x-admin-layout>