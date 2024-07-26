<x-admin-layout>
    <div class="p-4 flex justify-between">
        <h1 class="text-3xl text-gray-700 font-bold">Listado de marcas</h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('admin.brands.create') }}">Nuevo</a>
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
                    Nombre de la marca
                </th>
                <th scope="col" class="px-6 py-3">
                    
                </th>
            </tr>
        </thead>
        <tbody>   
            @foreach($brands as $brand)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $brand->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $brand->name }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.brands.edit', $brand) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $brands->links() }}
</div>


</x-admin-layout>