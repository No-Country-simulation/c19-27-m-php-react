<x-admin-layout>

        
    <!-- Formulario de actualización -->
    <form action="{{ route('client.profiles.update', $profile) }}" 
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
         class="block mb-2 w-full"
         placeholder="Ingrese el nombre"
         value="{{ old( 'name', $user->name) }}"/>

         <x-label class="mb-1">
            DNI
           </x-label>
           <x-input
           name="dni" 
            class="block mb-2 w-full"
            placeholder="Ingrese el DNI"
            value="{{ old( 'name', $user->profile?->dni) }}"/>

            <x-label class="mb-2">
                Fecha de nacimiento
               </x-label>
               <x-input
               type="date"
               name="date_of_birth" 
                class="block mb-2 w-full"
                placeholder="Ingrese la fecha de nacimiento"
                value="{{ old( 'name', $user->profile?->date_of_birth) }}"/>

                <x-label class="mb-2">
                    Celular
                   </x-label>
                   <x-input
                   name="phone_number" 
                    class="block mt-1 w-full"
                    placeholder="Ingrese n° de celular"
                    value="{{ old( 'name', $user->phone_number) }}"/>
   
         <x-label class="mb-2 mt-2">
            Email
           </x-label>
           <x-input
           type="email"
           name="email" 
            class="block mt-1 w-full"
            placeholder="Ingrese el email"
            value="{{ old('email',$user->email) }}"/>
        
            <x-label class="mb-2 mt-2">
                Contraseña
            </x-label>
            <x-input
                type="password"
                name="password" 
                class="block mt-1 w-full"
                placeholder="Ingrese nueva contraseña"/>

                <x-label class="mb-2 mt-2">Confirmar Contraseña</x-label>
                <x-input type="password" name="password_confirmation" class="block mt-1 w-full" placeholder="Confirme la nueva contraseña"/>
            </div>
    
            
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
            value="{{ old('address', $user->address) }}"/>

            <x-label class="mb-2 mt-2">
                Calle
               </x-label>
               <x-input
               name="street" 
                class="block mt-1 w-full"
                placeholder="Ingrese la dirección"
                value="{{ old('street', $user->street) }}"/>

                <x-label class="mb-2 mt-2">
                    Número de casa o depto
                   </x-label>
                   <x-input
                   name="house_number" 
                    class="block mt-1 w-full"
                    placeholder="Ingrese el n° de casa o depto"
                    value="{{ old('house_number', $user->house_number) }}"/>

                <x-label class="mb-2 mt-2">
                    Códigi postal
                   </x-label>
                   <x-input
                   name="postal_code" 
                    class="block mt-1 w-full"
                    placeholder="Ingrese el código postal"
                    value="{{ old('postal_code', $user->postal_code) }}"/>

                    <x-label class="mb-2 mt-2">
                        Ciudad
                       </x-label>
                       <x-input
                       name="city" 
                        class="block mt-1 w-full"
                        placeholder="Ingrese la ciudad"
                        value="{{ old('city', $user->city) }}"/>
                
                        <x-label class="mb-2 mt-2">
                            Provincia
                           </x-label>
                           <x-input
                           name="state" 
                            class="block mt-1 w-full"
                            placeholder="Ingrese la provincia"
                            value="{{ old('state', $user->state) }}"/>        
    </div>
 
    <div class="flex items-center justify-end mt-4">
         
        <!-- Botón de actualizar -->
        <x-button class="bg-red-500 mr-2">
            Actualizar
        </x-button>
        <!-- Botón de actualizar -->
        <x-button>
            <a href="{{ route('cart.confirm.cart') }}">Volver</a>
        </x-button>
    </div>
 
   
</x-admin-layout>