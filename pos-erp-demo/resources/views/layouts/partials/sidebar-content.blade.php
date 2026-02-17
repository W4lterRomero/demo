@php
    $pkg = session('demo_package', 'basico');
    
    // Define package levels
    $levels = [
        'basico' => 1,
        'completo' => 2,
        'premium' => 3,
    ];
    $currentLevel = $levels[$pkg] ?? 1;

    $menu = [
        ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'home', 'level' => 1],
        ['label' => 'Punto de Venta', 'route' => 'pos', 'icon' => 'shopping-cart', 'level' => 1],
        ['label' => 'Inventario', 'route' => 'inventory', 'icon' => 'archive-box', 'level' => 1], // Basic read-only
        ['label' => 'Reportes', 'route' => 'reports', 'icon' => 'chart-bar', 'level' => 1],
        ['label' => 'Cierre de Caja', 'route' => 'cash-close', 'icon' => 'currency-dollar', 'level' => 1],
        
        ['header' => 'Gestión Avanzada'],
        ['label' => 'Cuatrimotos', 'route' => 'motos', 'icon' => 'truck', 'level' => 2],
        ['label' => 'Eventos', 'route' => 'events', 'icon' => 'calendar', 'level' => 2],
        ['label' => 'Facturación (DTE)', 'route' => 'invoices', 'icon' => 'document-text', 'level' => 2],
        ['label' => 'Usuarios', 'route' => 'users', 'icon' => 'users', 'level' => 2],
        
        ['header' => 'Premium & BI'],
        ['label' => 'Inteligencia', 'route' => 'intelligence', 'icon' => 'light-bulb', 'level' => 3],
        ['label' => 'Auditoría Activos', 'route' => 'assets', 'icon' => 'clipboard-document-check', 'level' => 3],
        ['label' => 'Automatizaciones', 'route' => 'automations', 'icon' => 'cog-8-tooth', 'level' => 3],
        ['label' => 'App Móvil', 'route' => 'mobile', 'icon' => 'device-phone-mobile', 'level' => 3],
        ['label' => 'Seguridad', 'route' => 'security', 'icon' => 'shield-check', 'level' => 3],
    ];
@endphp

<div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4">
    <div class="flex h-16 shrink-0 items-center">
        <h1 class="text-xl font-bold text-white tracking-wider">POS <span class="text-blue-500">E-Sal</span></h1>
    </div>
    <nav class="flex flex-1 flex-col">
        <ul role="list" class="flex flex-1 flex-col gap-y-7">
            <li>
                <ul role="list" class="-mx-2 space-y-1">
                    @foreach ($menu as $item)
                        @if (isset($item['header']))
                            <li class="mt-4 mb-2">
                                <span class="text-xs font-semibold leading-6 text-gray-400 uppercase tracking-wider pl-2">{{ $item['header'] }}</span>
                            </li>
                        @else
                            @php
                                $isDisabled = $item['level'] > $currentLevel;
                                $isActive = request()->routeIs($item['route']);
                                $baseClasses = "group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold transition-colors";
                                $activeClasses = "bg-gray-800 text-white";
                                $inactiveClasses = "text-gray-400 hover:text-white hover:bg-gray-800";
                                $disabledClasses = "text-gray-600 cursor-not-allowed opacity-60";
                            @endphp

                            <li>
                                @if ($isDisabled)
                                    <div class="{{ $baseClasses }} {{ $disabledClasses }}" title="Disponible en paquete {{ $item['level'] == 2 ? 'Completo' : 'Premium' }}">
                                        {{-- Icon Placeholder --}}
                                        <x-icon :name="$item['icon']" class="w-6 h-6 shrink-0" />
                                        {{ $item['label'] }}
                                        <span class="ml-auto w-4 h-4 text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                              <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </div>
                                @else
                                    <a href="{{ Route::has($item['route']) ? route($item['route']) : '#' }}" class="{{ $baseClasses }} {{ $isActive ? $activeClasses : $inactiveClasses }}">
                                        <x-icon :name="$item['icon']" class="w-6 h-6 shrink-0" />
                                        {{ $item['label'] }}
                                    </a>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            
            <li class="mt-auto">
                <a href="{{ route('demo.logout') }}" class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-400 hover:bg-gray-800 hover:text-white">
                    <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                    Reiniciar Demo
                </a>
            </li>
        </ul>
    </nav>
</div>
