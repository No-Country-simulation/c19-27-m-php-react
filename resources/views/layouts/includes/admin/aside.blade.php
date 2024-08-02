@php
    $links = [
        // Admin
        [
            'name' => 'Dashboard',
            'url' => route('admin.dashboard.dashboard'),
            'active' => request()->routeIs('admin.dashboard.dashboard'),
            'icon' => 'fa-solid fa-gauge-high',
            'can' => ['dashboard-access']
        ],
        [
            'name' => 'Productos',
            'url' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*'),
            'icon' => 'fa-brands fa-product-hunt',
            'can' => ['product-access']
        ],
        [
            'name' => 'Categorías',
            'url' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*'),
            'icon' => 'fa-solid fa-list',
            'can' =>[ 'category-access']
        ],
        [
            'name' => 'Marcas',
            'url' => route('admin.brands.index'),
            'active' => request()->routeIs('admin.brands.*'),
            'icon' => 'fa-solid fa-copyright',
            'can' => ['brand-access']
        ],
        [
            'name' => 'Usuarios',
            'url' => route('admin.users.index'),
            'active' => request()->routeIs('admin.users.*'),
            'icon' => 'fa-solid fa-users',
            'can' => ['user-access']
        ],
        [
            'name' => 'Roles',
            'url' => route('admin.roles.index'),
            'active' => request()->routeIs('admin.roles.*'),
            'icon' => 'fa-solid fa-user-tag',
            'can' => ['role-access']
        ],
        [
            'name' => 'Permisos',
            'url' => route('admin.permissions.index'),
            'active' => request()->routeIs('admin.permissions.*'),
            'icon' => 'fa-solid fa-key',
            'can' => ['permission-access']
        ],
        // Clientes
        [
            'name' => 'Mi Cuenta',
            'url' => route('client.profiles.show'),
            'active' => request()->routeIs('client.profiles.*'),
            'icon' => 'fa-solid fa-user',
        ],
        [
            'name' => 'Mis Compras',
            'url' => route('client.purchase.index'),
            'active' => request()->routeIs('client.purchase.index'),
            'icon' => 'fa-solid fa-basket-shopping',
        ],
        [
            'name' => 'Favoritos',
            // 'url' => route('admin.permissions.index'),
            // 'active' => request()->routeIs('admin.permissions.*'),
            'active' => false, // Estado activo predeterminado
            'icon' => 'fa-solid fa-heart',
        ],

    ];
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
            @canany($link['can'] ?? [null])
            <a href="{{ $link['url'] ?? '#'}}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : ''}}">
              
                <i class="{{ $link['icon'] }} text-neon-green"></i>
              
               <span class="ms-3 text-gray-700">
                  {{ $link['name'] }}
               </span>
            </a>
            @endcanany
         </li>
          @endforeach
          
       </ul>
    </div>
 </aside>