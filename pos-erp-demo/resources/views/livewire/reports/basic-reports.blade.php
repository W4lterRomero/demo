<div class="space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Reportes de Ventas</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            <select wire:model.live="range" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6">
                <option value="today">Hoy</option>
                <option value="yesterday">Ayer</option>
                <option value="week">Últimos 7 días</option>
                <option value="month">Este Mes</option>
            </select>
        </div>
    </div>

    <!-- Metrics Cards -->
    <dl class="grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Ventas Totales</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">${{ number_format($totalSales, 2) }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Transacciones</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $transactionCount }}</dd>
        </div>
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Ticket Promedio</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">${{ number_format($averageTicket, 2) }}</dd>
        </div>
    </dl>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Chart -->
        <div class="bg-white rounded-lg shadow p-4">
            <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4">Tendencia de Ventas</h3>
            <div class="relative h-64 w-full">
                <canvas id="salesChart" wire:ignore></canvas>
            </div>
        </div>

        <!-- Top Products -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Productos Más Vendidos</h3>
            </div>
            <div class="border-t border-gray-200">
                <ul role="list" class="divide-y divide-gray-200">
                    @forelse($topProducts as $item)
                        <li class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="truncate text-sm font-medium text-blue-600">{{ $item->product->name }}</div>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                        {{ $item->total_qty }} un.
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2 flex justify-between">
                                <div class="sm:flex">
                                    <div class="flex items-center text-sm text-gray-500">
                                        <x-app-icon name="currency-dollar" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" />
                                        ${{ number_format($item->total_amount, 2) }} generado
                                    </div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="px-4 py-4 sm:px-6 text-sm text-gray-500">No hay datos de ventas en este periodo.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    @assets
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endassets

    @script
    <script>
        let chartInstance = null;

        function initChart(labels, data) {
            const ctx = document.getElementById('salesChart');
            if (!ctx) return;

            if (chartInstance) {
                chartInstance.destroy();
            }

            chartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Ventas ($)',
                        data: data,
                        backgroundColor: 'rgba(59, 130, 246, 0.5)',
                        borderColor: 'rgb(59, 130, 246)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Initialize on load
        initChart(@json($labels), @json($data));

        // Update on Livewire update
        $wire.on('updated', () => {
             // We can pass data through events or just re-read from component public props if we formatted them for JS
             // But simpler is to let Livewire re-render the whole script block logic or use dispatch
        });
        
        // Listen for specific event from component if needed, or just rely on render hook
        Livewire.hook('morph.updated', ({ el, component }) => {
            // Re-init chart logic if DOM was replaced
            // Ideally we'd use an event
        });
        
        $wire.watch('range', () => {
             // This runs after server roundtrip
             // We need to get the new data. 
             // Best way: component dispatches 'chart-updated' with new data
        });
        
        $wire.on('chart-updated', (data) => {
            initChart(data.labels, data.data);
        });
    </script>
    @endscript
</div>
