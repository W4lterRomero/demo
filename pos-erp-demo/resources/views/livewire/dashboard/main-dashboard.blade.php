<div>
    @if($package === 'basico')
        <livewire:dashboard.basic-dashboard />
    @elseif($package === 'completo')
        <!-- Completo Dashboard (Mockup) -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-purple-900 flex items-center gap-2 mb-4">
                Dashboard Completo <span class="text-sm font-normal bg-purple-100 text-purple-700 px-2 py-1 rounded-full">Demo</span>
            </h2>
            
            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 rounded-lg shadow border-l-4 border-purple-500">
                    <div class="text-sm text-gray-500">Ventas Totales</div>
                    <div class="text-2xl font-bold text-gray-900">$1,245.00</div>
                    <div class="text-xs text-green-600">↑ 12% vs ayer</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500">
                    <div class="text-sm text-gray-500">Reservas Eventos</div>
                    <div class="text-2xl font-bold text-gray-900">3</div>
                    <div class="text-xs text-gray-500">Para hoy</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow border-l-4 border-orange-500">
                    <div class="text-sm text-gray-500">Motos en Renta</div>
                    <div class="text-2xl font-bold text-gray-900">5 / 8</div>
                    <div class="text-xs text-orange-600">2 en mantenimiento</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow border-l-4 border-green-500">
                    <div class="text-sm text-gray-500">Facturas DTE</div>
                    <div class="text-2xl font-bold text-gray-900">12</div>
                    <div class="text-xs text-gray-500">Emitidas hoy</div>
                </div>
            </div>

            <!-- Vertical Charts Mockup -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-bold text-gray-700 mb-4">Ventas por Vertical</h3>
                    <div class="h-64 flex items-end justify-around space-x-2">
                        <div class="w-1/3 bg-blue-200 h-3/4 rounded-t relative group">
                            <div class="absolute inset-0 flex items-center justify-center text-blue-800 font-bold opacity-0 group-hover:opacity-100">Restaurante</div>
                        </div>
                        <div class="w-1/3 bg-orange-200 h-1/2 rounded-t relative group">
                            <div class="absolute inset-0 flex items-center justify-center text-orange-800 font-bold opacity-0 group-hover:opacity-100">Turismo</div>
                        </div>
                        <div class="w-1/3 bg-purple-200 h-1/4 rounded-t relative group">
                            <div class="absolute inset-0 flex items-center justify-center text-purple-800 font-bold opacity-0 group-hover:opacity-100">Eventos</div>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="font-bold text-gray-700 mb-4">Próximos Eventos</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center space-x-3 pb-3 border-b">
                            <span class="w-12 text-center text-sm font-bold text-gray-500">14:00</span>
                            <div class="flex-1">
                                <div class="font-bold text-gray-900">Cumpleaños Familia R.</div>
                                <div class="text-xs text-gray-500">Terraza A • 15 Pax</div>
                            </div>
                            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded">Confirmado</span>
                        </li>
                        <li class="flex items-center space-x-3 pb-3 border-b">
                            <span class="w-12 text-center text-sm font-bold text-gray-500">16:30</span>
                            <div class="flex-1">
                                <div class="font-bold text-gray-900">Tour Cuatrimotos (Corp)</div>
                                <div class="text-xs text-gray-500">Ruta Volcán • 8 Motos</div>
                            </div>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded">En Curso</span>
                        </li>
                    </ul>
                </div>
            </div>

             <div class="mt-8 p-4 bg-purple-50 border border-purple-200 rounded-md">
                <h3 class="text-purple-800 font-bold flex items-center gap-2">
                    <x-icon name="information-circle" class="w-5 h-5"/> Módulos Activos
                </h3>
                <p class="text-purple-600 mt-1">Explore los menús de "Cuatrimotos", "Eventos" y "Facturación" para ver las interfaces (placeholders).</p>
            </div>
        </div>

    @elseif($package === 'premium')
        <!-- Premium Dashboard (Mockup) -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-amber-900 flex items-center gap-2 mb-4">
                Dashboard Ejecutivo Premium <span class="text-sm font-normal bg-amber-100 text-amber-700 px-2 py-1 rounded-full">AI Powered</span>
            </h2>

            <!-- KPI Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gray-900 text-white rounded-xl p-6 shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10"><x-icon name="currency-dollar" class="w-24 h-24"/></div>
                    <div class="text-gray-400 text-sm uppercase tracking-wider">Utilidad Neta (Mes)</div>
                    <div class="text-4xl font-bold mt-2">$4,250.00</div>
                    <div class="mt-4 flex items-center text-green-400 text-sm">
                        <x-icon name="arrow-trending-up" class="w-4 h-4 mr-1"/>
                        +18.5% vs mes anterior
                    </div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="text-gray-500 text-sm uppercase tracking-wider">Punto de Equilibrio</div>
                    <div class="text-4xl font-bold mt-2 text-gray-900">82%</div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-4">
                        <div class="bg-amber-500 h-2.5 rounded-full" style="width: 82%"></div>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">Meta alcanzada (Día 24/30)</div>
                </div>
                <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                     <div class="text-gray-500 text-sm uppercase tracking-wider">Cash Flow (Proyección)</div>
                    <div class="text-4xl font-bold mt-2 text-gray-900">$12.5k</div>
                     <div class="mt-4 flex items-center text-green-600 text-sm">
                        <x-icon name="check-circle" class="w-4 h-4 mr-1"/>
                        Salud Financiera Óptima
                    </div>
                </div>
            </div>

            <!-- AI Insights -->
            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-6 border border-indigo-100 mb-8">
                <h3 class="font-bold text-indigo-900 mb-3 flex items-center">
                    <x-icon name="sparkles" class="w-5 h-5 mr-2 text-indigo-600"/>
                    Insights de Inteligencia Artificial
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-sm text-gray-600">Based on historical data, we predict a <span class="font-bold text-gray-900">25% surge in ATV rentals</span> for the upcoming long weekend. Recommend increasing staff by 2.</p>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-sm text-gray-600">Product "Plato Típico Premium" has low margin (12%). Suggest increasing price by $1.50 or renegotiating supplier costs to reach <span class="font-bold text-gray-900">target 20% margin</span>.</p>
                    </div>
                </div>
            </div>

            <!-- Placeholder Message -->
             <div class="mt-8 p-4 bg-amber-50 border border-amber-200 rounded-md">
                <h3 class="text-amber-800 font-bold flex items-center gap-2">
                    <x-icon name="lock-open" class="w-5 h-5"/> Acceso Total
                </h3>
                <p class="text-amber-600 mt-1">Explore los módulos de Inteligencia de Negocios, Auditoría y Automatizaciones en el menú.</p>
            </div>
        </div>
    @endif
</div>
