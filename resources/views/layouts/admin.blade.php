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

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased" 
    {{-- :class="{ 'overflow-hidden': open }" --}}
    x-data="{open: false}">
    

        <div class="min-h-screen bg-gray-100">
      

         

   @include('layouts.includes.admin.nav')

   @include('layouts.includes.admin.aside')
 
 <div class="p-4 sm:ml-64">
    <div class="p-4 bg-white  mt-14">

       {{ $slot }}
       
    </div>
 </div>
 

 
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
