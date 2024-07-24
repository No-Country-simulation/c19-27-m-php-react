<x-admin-layout>

        <h1 class="text-xl text-gray-700 font-bold pl-2 mb-4">Rol {{ $role->name }}</h1>
     
        <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @if ($permissions->isEmpty())
                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" >
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                      </svg>
                      <div>
                        <span class="font-bold">Informacion!</span> 
                        <p>El rol no posee ningún permiso.</p>
                      </div>
                </div>
            @else
                <h2 class="text-lg text-gray-700 font-bold mb-2">Permisos:</h2>
                <ul class="list-disc list-inside">
                    @foreach ($permissions as $permission)
                        <li class="text-gray-600">{{ $permission->name }}</li>
                    @endforeach
                </ul>
            @endif
        
        </div>


        <div class="mt-4">
            <x-button >
                <a href="{{ route('admin.roles.index') }}">volver</a>
            </x-button>
        </div>
</x-admin-layout>