<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
           
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <h1 class="text-xl font-bold mb-4">Iniciar sesión</h1>
                {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                <x-label>
                    Correo electrónico
                </x-label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                <x-label>Contraseña</x-label>
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    {{-- <x-checkbox id="remember_me" name="remember" /> --}}
                    {{-- <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span> --}}
                <span class="ms-2 text-sm text-gray-600 mb-4">¿Olvidaste tu contraseña? No te preocupes, pide un código verificador por correo o SMS
                    para cambiar tu contraseña.</span>
                </label>
            </div>

            <div class= "items-center justify-center mt-4">
               
                <div class="flex justify-center mb-4">
                    <x-button class="ms-4 text-white bg-blue-500 hover:bg-blue-700	">
                        {{-- {{ __('Log in') }} --}}
                        Ingresar
                    </x-button>
                </div> 
                <div class="flex justify-center mb-4"> 
                    @if (Route::has('password.request'))
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a> --}}
                     <a href="{{ route('register') }}" class="text-sm">¿Aún no tienes cuenta? Regístrate</a>
                    @endif 
                </div> 
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
