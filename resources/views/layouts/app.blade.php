<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- fontawesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


      

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
         {{-- sweet alert 2 --}}
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Styles -->
        @livewireStyles
  
        <style>
            /* Webkit browsers (Chrome, Safari) */
            .quantity-input::-webkit-outer-spin-button,
            .quantity-input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            /* Firefox */
            .quantity-input[type="number"] {
                -moz-appearance: textfield;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @stack('css')
        <x-banner />

        <div class="min-h-screen bg-gray-50">
            @livewire('navigation-menu')

              <!-- Include Gray Bar Component -->
        <x-gray-bar />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="">
                {{ $slot }}
            </main>

             @include('components.footer-layout')
        </div>

       

        @stack('modals')
        @stack('js')
        @livewireScripts

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        @if(session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
        @endif
    </body>
</html>
