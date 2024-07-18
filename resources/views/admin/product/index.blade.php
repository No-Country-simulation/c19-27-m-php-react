<x-admin-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
         <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product->name }}
                </li>
            @endforeach
         </ul>

        </div>
    </div>
</x-admin-layout>