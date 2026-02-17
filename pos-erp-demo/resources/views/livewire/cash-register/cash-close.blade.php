<div class="max-w-2xl mx-auto">
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Cierre de Caja</h2>
        </div>
    </div>

    @if($isClosed)
        <div class="rounded-md bg-green-50 p-4 shadow mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <x-app-icon name="shield-check" class="h-5 w-5 text-green-400" />
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">Caja cerrada exitosamente</h3>
                    <div class="mt-2 text-sm text-green-700">
                        <p>El arqueo se ha guardado. Puede ver el detalle en los reportes.</p>
                        <div class="mt-4">
                            <a href="{{ route('dashboard') }}" class="font-medium underline hover:text-green-600">Volver al Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white shadow sm:rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Arqueo de Efectivo</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Ingrese el monto total contado en efectivo para compararlo con el sistema.</p>
                </div>
                
                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label class="block text-sm font-medium leading-6 text-gray-900">Ventas Registradas (Sistema)</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 bg-gray-50 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">$</span>
                                <input type="text" disabled value="{{ number_format($expectedAmount, 2) }}" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="counted" class="block text-sm font-medium leading-6 text-gray-900">Monto Contado (Físico)</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 sm:max-w-md">
                                <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">$</span>
                                <input type="number" step="0.01" wire:model.live.debounce.500ms="countedAmount" id="counted" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="0.00">
                            </div>
                        </div>
                    </div>
                </div>

                @if(!is_null($countedAmount))
                    <div class="mt-8 p-4 rounded-lg {{ $difference == 0 ? 'bg-green-50' : ($difference > 0 ? 'bg-blue-50' : 'bg-red-50') }}">
                        <div class="flex justify-between items-center">
                            <span class="text-sm font-medium text-gray-700">Diferencia:</span>
                            <span class="text-xl font-bold {{ $difference == 0 ? 'text-green-700' : ($difference > 0 ? 'text-blue-700' : 'text-red-700') }}">
                                {{ $difference > 0 ? '+' : '' }}{{ number_format($difference, 2) }}
                            </span>
                        </div>
                        <p class="text-xs mt-1 text-gray-500 text-right">
                            @if($difference == 0) Perfecto, la caja cuadra.
                            @elseif($difference > 0) Sobrante de efectivo.
                            @else Faltante de efectivo.
                            @endif
                        </p>
                    </div>
                @endif

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button wire:click="closeRegister" type="button" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        Cerrar Turno
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
