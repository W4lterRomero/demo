<div class="space-y-6">
    <!-- Header & Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
            <div class="text-sm text-gray-500">Flota Total</div>
            <div class="text-2xl font-bold text-gray-900">{{ $total_motos }}</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg shadow-sm border border-green-100">
            <div class="text-sm text-green-600">Disponibles</div>
            <div class="text-2xl font-bold text-green-700">{{ $available_count }}</div>
        </div>
        <div class="bg-orange-50 p-4 rounded-lg shadow-sm border border-orange-100">
            <div class="text-sm text-orange-600">En Uso</div>
            <div class="text-2xl font-bold text-orange-700">{{ $rented_count }}</div>
        </div>
        <div class="bg-red-50 p-4 rounded-lg shadow-sm border border-red-100">
            <div class="text-sm text-red-600">Mantenimiento</div>
            <div class="text-2xl font-bold text-red-700">{{ $maintenance_count }}</div>
        </div>
    </div>

    <!-- Filters -->
    <div class="flex flex-col sm:flex-row gap-4 justify-between items-center bg-white p-4 rounded-lg shadow-sm">
        <div class="relative w-full sm:w-64">
            <x-app-icon name="magnifying-glass" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"/>
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar unidad..." class="pl-10 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <div class="flex gap-2">
            <select wire:model.live="statusFilter" class="rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                <option value="">Todos los Estados</option>
                <option value="disponible">Disponible</option>
                <option value="en_uso">En Uso</option>
                <option value="mantenimiento">Mantenimiento</option>
            </select>
            <button class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 text-sm font-medium flex items-center gap-2">
                <x-app-icon name="plus" class="w-4 h-4"/> Nueva Unidad
            </button>
        </div>
    </div>

    <!-- Grid Layout -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($motos as $moto)
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <!-- Image Placeholder -->
                <div class="h-40 bg-gray-100 relative group">
                     @if($moto->status == 'mantenimiento')
                        <div class="absolute inset-0 bg-red-500/10 flex items-center justify-center">
                            <span class="bg-red-100 text-red-800 text-xs font-bold px-2 py-1 rounded">MANTENIMIENTO</span>
                        </div>
                    @endif
                    <div class="flex items-center justify-center h-full text-gray-300">
                        <x-app-icon name="truck" class="w-16 h-16"/>
                    </div>
                    <div class="absolute top-2 right-2">
                        <span class="px-2 py-1 text-xs font-bold rounded-full 
                            {{ $moto->status == 'disponible' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $moto->status == 'en_uso' ? 'bg-orange-100 text-orange-800' : '' }}
                            {{ $moto->status == 'mantenimiento' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst(str_replace('_', ' ', $moto->status)) }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-900">{{ $moto->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $moto->brand }} {{ $moto->model }}</p>

                    <div class="mt-4 flex items-center justify-between text-sm">
                        <div class="flex items-center text-gray-600">
                            <x-app-icon name="clock" class="w-4 h-4 mr-1"/>
                            {{ $moto->km }} km
                        </div>
                        <div class="text-xs text-gray-400">
                            Servicio: {{ $moto->last_service ? \Carbon\Carbon::parse($moto->last_service)->format('d/m') : 'N/A' }}
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-2 gap-2">
                        @if($moto->status == 'disponible')
                            <button wire:click="updateStatus({{ $moto->id }}, 'en_uso')" class="w-full py-1.5 px-3 bg-orange-50 text-orange-600 text-xs font-medium rounded hover:bg-orange-100">
                                Rentar
                            </button>
                            <button wire:click="updateStatus({{ $moto->id }}, 'mantenimiento')" class="w-full py-1.5 px-3 bg-gray-50 text-gray-600 text-xs font-medium rounded hover:bg-gray-100">
                                Servicio
                            </button>
                        @elseif($moto->status == 'en_uso')
                            <button wire:click="updateStatus({{ $moto->id }}, 'disponible')" class="col-span-2 w-full py-1.5 px-3 bg-green-50 text-green-600 text-xs font-medium rounded hover:bg-green-100">
                                Finalizar Renta
                            </button>
                        @elseif($moto->status == 'mantenimiento')
                            <button wire:click="updateStatus({{ $moto->id }}, 'disponible')" class="col-span-2 w-full py-1.5 px-3 bg-green-50 text-green-600 text-xs font-medium rounded hover:bg-green-100">
                                Finalizar Servicio
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $motos->links() }}
    </div>
</div>
