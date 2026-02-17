<div class="h-[calc(100vh-5rem)] flex flex-col md:flex-row gap-4">
    <!-- Main Content (Products) -->
    <div class="flex-1 flex flex-col min-w-0 bg-white rounded-lg shadow overflow-hidden">
        <!-- Search & Categories -->
        <div class="p-4 border-b">
            <div class="mb-4">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Buscar productos..." class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="flex space-x-2 overflow-x-auto pb-2 scrollbar-hide">
                <button wire:click="$set('selectedCategory', null)" 
                        class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap {{ is_null($selectedCategory) && !$search ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Todos
                </button>
                @foreach($categories as $category)
                    <button wire:click="$set('selectedCategory', {{ $category->id }}); $set('search', '')" 
                            class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap flex items-center gap-2 {{ $selectedCategory == $category->id && !$search ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                        <span>{{ $category->icon }}</span> {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Product Grid -->
        <div class="flex-1 overflow-y-auto p-4 bg-gray-50">
            @if($products->isEmpty())
                <div class="text-center py-10 text-gray-500">No hay productos.</div>
            @endif
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @foreach($products as $product)
                    <button wire:click="addToCart({{ $product->id }})" class="group relative flex flex-col bg-white rounded-lg shadow-sm border hover:shadow-md transition-all text-left p-2 h-full">
                        <div class="aspect-square w-full bg-gray-200 rounded-md mb-2 overflow-hidden flex items-center justify-center text-3xl text-gray-400">
                            {{-- Placeholder image logic --}}
                            @if(str_contains($product->name, 'Pupusa')) 🫓
                            @elseif(str_contains($product->name, 'Café')) ☕
                            @elseif(str_contains($product->name, 'Soda')) 🥤
                            @else 📦
                            @endif
                        </div>
                        <h3 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 line-clamp-2 h-10">{{ $product->name }}</h3>
                        <p class="mt-auto text-lg font-bold text-gray-900">${{ number_format($product->price, 2) }}</p>
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Cart Sidebar -->
    <div class="w-full md:w-96 bg-white rounded-lg shadow flex flex-col h-[40vh] md:h-full">
        <div class="p-4 border-b bg-gray-50 rounded-t-lg">
            <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <x-icon name="shopping-cart" class="h-5 w-5 text-blue-600"/> Current Order
            </h2>
        </div>

        <div class="flex-1 overflow-y-auto p-4 space-y-4">
            @forelse($cart as $item)
                <div class="flex items-center justify-between group">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">{{ $item['name'] }}</h4>
                        <div class="text-xs text-gray-500">${{ number_format($item['price'], 2) }} c/u</div>
                    </div>
                    <div class="flex items-center gap-3">
                        <button wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] - 1 }})" class="p-1 text-gray-400 hover:text-red-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"/></svg>
                        </button>
                        <span class="text-sm font-semibold w-6 text-center">{{ $item['quantity'] }}</span>
                        <button wire:click="updateQuantity({{ $item['id'] }}, {{ $item['quantity'] + 1 }})" class="p-1 text-gray-400 hover:text-green-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </div>
                    <div class="w-16 text-right font-medium text-gray-900">
                        ${{ number_format($item['price'] * $item['quantity'], 2) }}
                    </div>
                </div>
            @empty
                <div class="text-center py-10 text-gray-400 flex flex-col items-center">
                    <x-icon name="shopping-cart" class="w-12 h-12 mb-2 opacity-20"/>
                    <p>El carrito está vacío</p>
                </div>
            @endforelse
        </div>

        <div class="p-4 border-t bg-gray-50 rounded-b-lg">
            <div class="space-y-2 mb-4">
                <div class="flex justify-between text-sm text-gray-600">
                    <span>Subtotal</span>
                    <span>${{ number_format($this->subtotal, 2) }}</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600">
                    <span>IVA (13%)</span>
                    <span>${{ number_format($this->tax, 2) }}</span>
                </div>
                <div class="flex justify-between text-xl font-bold text-gray-900 pt-2 border-t">
                    <span>Total</span>
                    <span>${{ number_format($this->total, 2) }}</span>
                </div>
            </div>

            <button wire:click="$set('showCheckoutModal', true)" 
                    @disabled(empty($cart))
                    class="w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                Cobrar ${{ number_format($this->total, 2) }}
            </button>
        </div>
    </div>

    <!-- Checkout Modal -->
    @if($showCheckoutModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <x-icon name="currency-dollar" class="h-6 w-6 text-green-600"/>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Finalizar Venta</h3>
                                <div class="mt-4 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Total a Pagar</label>
                                        <div class="mt-1 text-2xl font-bold text-gray-900">${{ number_format($this->total, 2) }}</div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Método de Pago</label>
                                        <div class="mt-2 grid grid-cols-2 gap-3">
                                            <button wire:click="$set('paymentMethod', 'efectivo')" class="flex items-center justify-center px-4 py-2 border rounded-md text-sm font-medium {{ $paymentMethod === 'efectivo' ? 'border-blue-500 ring-2 ring-blue-500 text-blue-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50' }}">
                                                💵 Efectivo
                                            </button>
                                            <button wire:click="$set('paymentMethod', 'tarjeta')" class="flex items-center justify-center px-4 py-2 border rounded-md text-sm font-medium {{ $paymentMethod === 'tarjeta' ? 'border-blue-500 ring-2 ring-blue-500 text-blue-600' : 'border-gray-300 text-gray-700 hover:bg-gray-50' }}">
                                                💳 Tarjeta
                                            </button>
                                        </div>
                                    </div>

                                    @if($paymentMethod === 'efectivo')
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Monto Recibido</label>
                                            <div class="mt-1 relative rounded-md shadow-sm">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-sm">$</span>
                                                </div>
                                                <input type="number" wire:model.live="amountPaid" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-7 pr-12 sm:text-lg border-gray-300 rounded-md" placeholder="0.00">
                                            </div>
                                            @if($amountPaid >= $this->total)
                                                <div class="mt-2 text-right text-green-600 font-bold">
                                                    Cambio: ${{ number_format($this->change, 2) }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="processCheckout" 
                                @if($paymentMethod === 'efectivo' && $amountPaid < $this->total) disabled @endif
                                type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                            Confirmar Cobro
                        </button>
                        <button wire:click="$set('showCheckoutModal', false)" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
