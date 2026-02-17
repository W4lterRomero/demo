<div>
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Dashboard Básico</h2>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
        <!-- Sales Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-icon name="currency-dollar" class="h-6 w-6 text-gray-400" />
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Ventas de Hoy</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">${{ number_format($salesToday, 2) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('reports') }}" class="font-medium text-blue-700 hover:text-blue-900">Ver reporte detallado</a>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-icon name="shopping-cart" class="h-6 w-6 text-gray-400" />
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Órdenes Hoy</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{ $ordersCount }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                    <a href="{{ route('pos') }}" class="font-medium text-blue-700 hover:text-blue-900">Ir al Punto de Venta</a>
                </div>
            </div>
        </div>

        <!-- Ticket Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-icon name="chart-bar" class="h-6 w-6 text-gray-400" />
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Ticket Promedio</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">${{ number_format($avgTicket, 2) }}</div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Accesos Rápidos</h3>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <a href="{{ route('pos') }}" class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:border-gray-400">
            <div class="flex-shrink-0">
                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-100 ring-4 ring-white">
                    <x-icon name="shopping-cart" class="h-6 w-6 text-blue-600" />
                </span>
            </div>
            <div class="min-w-0 flex-1">
                <span class="absolute inset-0" aria-hidden="true"></span>
                <p class="text-sm font-medium text-gray-900">Nueva Venta</p>
                <p class="truncate text-sm text-gray-500">Abrir POS</p>
            </div>
        </a>

        <a href="{{ route('cash-close') }}" class="relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 hover:border-gray-400">
            <div class="flex-shrink-0">
                <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-green-100 ring-4 ring-white">
                    <x-icon name="currency-dollar" class="h-6 w-6 text-green-600" />
                </span>
            </div>
            <div class="min-w-0 flex-1">
                <span class="absolute inset-0" aria-hidden="true"></span>
                <p class="text-sm font-medium text-gray-900">Corte de Caja</p>
                <p class="truncate text-sm text-gray-500">Realizar arqueo</p>
            </div>
        </a>
    </div>
</div>
