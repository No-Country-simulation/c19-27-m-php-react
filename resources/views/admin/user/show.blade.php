<x-admin-layout>

    <!-- Campos del formulario de actualización -->
 
    <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <h1 class="text-xl text-gray-700 font-bold mb-4">Datos del usuario</h1>
        <x-label class="mb-2 ">
         Nombre
        </x-label>
        <x-input
        disabled
        name="name" 
         class="block mt-1 w-full bg-slate-100"
         value="{{ $user->name }}"/>

         <x-label class="mb-2 mt-2">
            Email
           </x-label>
           <x-input
           disabled
           name="email" 
            class="block mt-1 w-full bg-slate-100"
            value="{{ $user->email }}"/>
        
            <x-label class="mb-2 mt-2">
                Número de celular
               </x-label>
               <x-input
               disabled
               name="phone_number" 
                class="block mt-1 w-full bg-slate-100"
                value="{{ $user->phone_number }}"/>
    </div>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <h1 class="text-xl text-gray-700 font-bold mb-4">Roles del usuario</h1>
        <x-label class="mb-2">
            Roles asignados
        </x-label>
            @if ($user->roles->isEmpty())
                <p class=" bg-red-100 border border-red-300 text-red-700 rounded py-2 px-4">Este usuario no posee ningún rol.</p>
            @else
            <ul class="list-disc list-inside mt-2 mb-4">
                @foreach ($user->roles as $role)
                    <li class="bg-slate-100 rounded px-4 py-2 -mb-1">
                        {{ $role->name }}
                    </li>
                @endforeach
            </ul>
            @endif
       
        
    </div>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-xl text-gray-700 font-bold mb-4">Dirección del usuario</h1>

        <x-label class="mb-2 mt-2">
            Dirección
           </x-label>
           <x-input
           disabled
           name="address" 
            class="block mt-1 w-full bg-slate-100"
            value="{{ $user->address }}"/>

            <x-label class="mb-2 mt-2">
                Calle
               </x-label>
               <x-input
               disabled
               name="street" 
                class="block mt-1 w-full bg-slate-100"
                value="{{ $user->street }}"/>

                <x-label class="mb-2 mt-2">
                    Número de casa o depto
                   </x-label>
                   <x-input
                   disabled
                   name="house_number" 
                    class="block mt-1 w-full bg-slate-100"
                    value="{{ $user->house_number }}"/>

                <x-label class="mb-2 mt-2">
                    Códigi postal
                   </x-label>
                   <x-input
                   disabled
                   name="postal_code" 
                    class="block mt-1 w-full bg-slate-100"
                    value="{{ $user->postal_code }}"/>

                    <x-label class="mb-2 mt-2">
                        Ciudad
                       </x-label>
                       <x-input
                       disabled
                       name="city" 
                        class="block mt-1 w-full bg-slate-100"
                        value="{{ $user->city }}"/>
                
                        <x-label class="mb-2 mt-2">
                            Provincia
                           </x-label>
                           <x-input
                           disabled
                           name="state" 
                            class="block mt-1 w-full bg-slate-100"
                            value="{{ $user->state }}"/>        
    </div>
    <div class="flex items-center justify-end mt-4">
        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
        @csrf 
        @method('DELETE')
        <input type="text" hidden name="id" value="{{ $user->id }}">

        <x-validation-errors class="mb-4"/>
        <x-danger-button class="mr-2"
        type="submit">
            eliminar
        </x-danger-button>
    </form>
    <x-button>
        <a href="{{ route('admin.users.index') }}">volver</a>
    </x-button>
    </div>

</x-admin-layout>