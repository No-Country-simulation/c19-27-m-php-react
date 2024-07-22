<x-admin-layout>
    <div class="p-4 flex justify-between">
        <h1 class="text-3xl text-gray-700 font-bold">Listado de roles</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('admin.roles.create') }}">Nuevo</a>
        </button>
    </div>
    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>   
            @foreach($roles as $role)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $role->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $role->name }}
                    </td>
                    <td class=" flex justify-end mr-20">
                        <a href="{{ route('admin.roles.edit', $role) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        <a href="{{ route('admin.roles.show', $role) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline ml-3">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-admin-layout>