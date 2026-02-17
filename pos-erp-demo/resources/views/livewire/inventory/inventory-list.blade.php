<div class="space-y-6">
    <div class="md:flex md:items-center md:justify-between">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Inventario</h2>
        </div>
        <div class="mt-4 flex md:ml-4 md:mt-0">
            @if($canEdit)
                <button type="button" class="ml-3 inline-flex items-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    <x-app-icon name="plus" class="-ml-0.5 mr-1.5 h-5 w-5" />
                    Nuevo Producto
                </button>
            @else
                <span class="inline-flex items-center rounded-md bg-gray-100 px-3 py-2 text-sm font-medium text-gray-500 cursor-not-allowed  ring-1 ring-inset ring-gray-300" title="Disponible en Paquete Completo">
                    <x-app-icon name="lock-closed" class="-ml-0.5 mr-1.5 h-4 w-4" />
                    Editar Inventario (Completo)
                </span>
            @endif
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div>
                <label for="search" class="block text-sm font-medium leading-6 text-gray-900">Buscar</label>
                <div class="relative mt-2 rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Nombre del producto">
                </div>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Categoría</label>
                <select wire:model.live="categoryFilter" id="category" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-blue-600 sm:text-sm sm:leading-6">
                    <option value="">Todas</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <div class="flex items-center h-full pb-2">
                    <input wire:model.live="lowStockFilter" id="low_stock" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600">
                    <label for="low_stock" class="ml-3 text-sm leading-6 text-gray-900">Solo Stock Bajo ⚠️</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Producto</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Categoría</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Precio</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Stock</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Estado</th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Acciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse($products as $product)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 bg-gray-100 rounded-full flex items-center justify-center text-xl">
                                    {{-- Placeholder image logic --}}
                                    @if(str_contains($product->name, 'Pupusa')) 🫓
                                    @elseif(str_contains($product->name, 'Café')) ☕
                                    @elseif(str_contains($product->name, 'Soda')) 🥤
                                    @else 📦
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="font-medium text-gray-900">{{ $product->name }}</div>
                                    <div class="text-gray-500">{{ $product->unit }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $product->category->name }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">${{ number_format($product->price, 2) }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            @php
                                $stock = $product->inventory?->stock ?? 0;
                                $min = $product->inventory?->min_stock ?? 0;
                                $isLow = $stock <= $min;
                            @endphp
                            <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium {{ $isLow ? 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/10' : 'bg-green-50 text-green-700 ring-1 ring-inset ring-green-600/20' }}">
                                {{ $stock }}
                            </span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            @if($product->active)
                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">Activo</span>
                            @else
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Inactivo</span>
                            @endif
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            @if($canEdit)
                                <a href="#" class="text-blue-600 hover:text-blue-900">Editar</a>
                            @else
                                <span class="text-gray-400 cursor-not-allowed">Editar</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-3 py-4 text-sm text-gray-500 text-center">No se encontraron productos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
