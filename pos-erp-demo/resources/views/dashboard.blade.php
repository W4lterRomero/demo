<x-demo-layout>
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Dashboard</h2>
        </div>
    </div>

    <div class="py-6">
        <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <x-icon name="light-bulb" class="h-5 w-5 text-blue-400" />
                </div>
                <div class="ml-3">
                    <p class="text-sm text-blue-700">
                        Bienvenido a la demo de <strong>Paquete {{ ucfirst(session('demo_package')) }}</strong>.
                        @if(session('demo_package') === 'basico')
                            Las funciones avanzadas en el menú están deshabilitadas para demostrar las diferencias.
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Placeholder Card 1 -->
            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-icon name="currency-dollar" class="h-6 w-6 text-gray-400" />
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-gray-500">Ventas Hoy</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">$350.00</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-blue-700 hover:text-blue-900">Ver reporte</a>
                    </div>
                </div>
            </div>

            <!-- Placeholder Card 2 -->
             <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <x-icon name="shopping-cart" class="h-6 w-6 text-gray-400" />
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="truncate text-sm font-medium text-gray-500">Órdenes Abiertas</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">3</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
                 <div class="bg-gray-50 px-5 py-3">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-blue-700 hover:text-blue-900">Ir al POS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-demo-layout>
