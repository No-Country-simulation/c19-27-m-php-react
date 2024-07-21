@php
     $links = [
      [
        'name' => 'Dashboard',
        'url' => route('admin.dashboard.dashboard'),
        'active' => request()->routeIs('admin.dashboard.dashboard'),
        'icon' => 'fa-solid fa-gauge-high',
      ],
      [
        'name' => 'Productos',
         'url' => route('admin.products.index'),
         'active' => request()->routeIs('admin.products.*'),
        'icon' => 'fa-brands fa-product-hunt',
      ],
      [
      'name' => 'Categorías',
        'url' => route('admin.categories.index'),
        'active' => request()->routeIs('admin.categories.*'),
        'icon' => 'fa-solid fa-list',
      ],
      [
      'name' => 'Marcas',
        'url' => route('admin.brands.index'),
        'active' => request()->routeIs('admin.brands.*'),
        'icon' => 'fa-solid fa-copyright',
      ],
      [
      'name' => 'Usuarios',
        'url' => route('admin.users.index'),
        'active' => request()->routeIs('admin.users.*'),
        'icon' => 'fa-solid fa-users',
      ],
      [
      'name' => 'Roles',
        'url' => route('admin.roles.index'),
        'active' => request()->routeIs('admin.roles.*'),
        'icon' => 'fa-solid fa-users-gear',
      ],
      [
      'name' => ' Permisos',
      //   'url' => route('#'),
      //   'active' => request()->routeIs('#'),
        'icon' => 'fa-solid fa-user-lock',
      ],

     ]
@endphp

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar"
:class="{
  '-translate-x-full': !open,
  'transform-none': open
}">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-1 font-medium">
         
          @foreach ($links as $link)
          <li>
            <a href="{{ $link['url'] ?? '#'}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group ">
              
                <i class="{{ $link['icon'] }} text-green-400"></i>
              
               <span class="ms-3 text-gray-700">
                  {{ $link['name'] }}
               </span>
            </a>
         </li>
          @endforeach
          
       </ul>
    </div>
 </aside>