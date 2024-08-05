<x-admin-layout>
    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre 
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de emisión
                    </th>                
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Ver</span>
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach($bills as $bill)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $bill->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Factura #{{ $bill->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $bill->created_at->format('d/m/Y') }}
                        </td>
                       
                        <td class="px-6 py-4 text-right">                         
                            <a href="{{ route('bill.show', ['bill' => $bill->id]) }}" class="font-medium text-green-600 dark:text-green-500 hover:underline ml-3">Ver</a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
   
    
    </x-admin-layout>