<x-app-layout>
    <div class="w-full h-screen relative">
        <img class="w-full h-full object-c" src="{{ asset('theme-admin/img/Rectangle-7.png') }}" alt="">
        <h4 class="absolute top-0 left-1/2 text-white mt-24 texto-primera-imagen" >Elementos esenciales para los jugadores de videojuegos</h4>
    </div>
    
    <div class="flex justify-center mt-8">
        <div class="w-1/4 p-1">
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('theme-admin/img/Rectangle-22.png') }}" alt="Sunset in the mountains">
                <h4 class="absolute top-0 left-1/2 transform -translate-x-1/2 p-2 text-white mt-72 cards-categorias">Sillas Gamer</h4>
            </div>
        </div>

        <div class="w-1/4 p-1">
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('theme-admin/img/Rectangle-23.png') }}" alt="Sunset in the mountains">
                <h4 class="absolute top-0 left-1/2 transform -translate-x-1/2 p-2 text-white mt-72 cards-categorias">VR Headset</h4>
            </div>
        </div>

        <div class="w-1/4 p-1">
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('theme-admin/img/Rectangle-24.png') }}" alt="Sunset in the mountains">
                <h4 class="absolute top-0 left-1/2 transform -translate-x-1/2 p-2 text-white mt-72 cards-categorias">Simuladores</h4>
            </div>
        </div>

        <div class="w-1/4 p-1">
            <div class="relative max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ asset('theme-admin/img/Rectangle-25.png') }}" alt="Sunset in the mountains">
                <h4 class="absolute top-0 left-1/2 transform -translate-x-1/2 p-2 text-white mt-72 cards-categorias">Consolas</h4>
            </div>
        </div>
    </div>
    <img class="mt-16" src="{{ asset('theme-admin/img/Rectangle-12.png') }}" alt="" >
    
    <h2 class="text-center font-black mt-10" style="font-size: 40px;">Descuentos que no te puedes perder</h2>
    <div class="flex justify-center mt-12">
        <div class="w-1/3 p-1">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto contenedor-descuentos">
                <p class="font-bold mb-6 mt-4 ml-6" style="font-size: 40px;">Videojuegos</p>
                <img class="w-full h-48 object-cover" src="{{ asset('theme-admin/img/Game-Cartridge-Sonic-Hero.png') }}" alt="Sunset in the mountains">
                <p class="text-center font-bold porcentaje-descuentos">50%</p>
                <p class="text-center mb-6">Lorem ipsum dolor sit amet, consecte</p>
            </div>
        </div>

        <div class="w-1/3 p-1">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto contenedor-descuentos">
                <p class="font-bold mb-6 mt-4 ml-6" style="font-size: 40px;">Teclados</p>
                <img class="w-full h-48 object-cover" src="{{ asset('theme-admin/img/teclado-gamer.png') }}" alt="Sunset in the mountains">
                <p class="text-center font-bold porcentaje-descuentos">70%</p>
                <p class="text-center mb-6">Lorem ipsum dolor sit amet, consecte</p>
            </div>
        </div>

        <div class="w-1/3 p-1">
            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto contenedor-descuentos">
                <p class="font-bold mb-6 mt-4 ml-6" style="font-size: 40px;">Simuladores</p>
                <img class="w-full h-48 object-cover" src="{{ asset('theme-admin/img/Driving-Game-Device.png') }}" alt="Sunset in the mountains">
                <p class="text-center font-bold porcentaje-descuentos">20%</p>
                <p class="text-center mb-6">Lorem ipsum dolor sit amet, consecte</p>
            </div>
        </div>
    </div>


    <h2 class="text-center font-black mt-10" style="font-size: 40px;">¡Lo último!</h2>
    <div class="flex justify-center mt-8">
        @foreach($latestProducts as $latestProduct)
            <div class="w-1/4 p-2">
                <div class="h-64 w-full max-w-sm rounded overflow-hidden shadow-lg mx-auto flex flex-col items-center" style="background:white">
                    <div class="h-48 w-full mt-6">
                        <img class="h-full w-full object-cover object-center" src="{{ Storage::url($latestProduct->image) }}" alt="Sunset in the mountains">
                    </div>
                    <h2 class="text-center mt-2">{{ $latestProduct->name }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>