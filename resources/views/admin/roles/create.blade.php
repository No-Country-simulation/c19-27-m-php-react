<x-admin-layout>
  
    <form action="{{ route('admin.roles.store') }}" 
    method="POST"
    class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    
    <x-validation-errors class="mb-4"/>
 
    <div class="mb-4">
        <x-label class="mb-2">
         Nombre
        </x-label>
        <x-input
        name="name" 
         class="block mt-1 w-full"
         placeholder="Escriba el nombre del rol"
         value="{{ old('name') }}" />
    </div>
    
 
    <div class="flex items-center justify-end mt-4">
        <x-button>
            Crear rol
        </x-button>
    </div>
 
    </form>
 </x-admin-layout>