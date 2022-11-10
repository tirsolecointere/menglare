<div x-data>
    <div class="mb-4">
        <x-jet-label for="select-size">Talla</x-jet-label>
        <select wire:model="size_id" id="select-size" class="block bg-white w-1/2 border border-gray-300 hover:border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-stone-200 focus:border-stone-500 p-2.5 cursor-pointer transition">
            <option value="" selected disabled>Seleccionar una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4 {{ empty($colors) ? 'opacity-75 cursor-default' : '' }}">
        <x-jet-label for="select-color">Color</x-jet-label>
        <select wire:model="color_id" id="select-color" class="block bg-white w-1/2 border border-gray-300 hover:border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-2 focus:ring-stone-200 focus:border-stone-500 p-2.5 transition {{ empty($colors) ? 'cursor-default' : 'cursor-pointer' }}"
            {{ empty($colors) ? 'disabled' : '' }}>
            <option value="" selected disabled>Seleccionar un color</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-8" x-show="$wire.stock">
        <div class="mb-3">Stock disponible: <b>{{ $stock }}</b></div>
        <div class="flex items-center gap-6">
            <div class="flex items-center space-x-2">
                <x-jet-secondary-button wire:click="decrement" class="py-3" disabled
                    wire:loading.attr="disabled"
                    wire:target="decrement"
                    x-bind:disabled="$wire.qty <= 1">
                    <span class="sr-only">Quantity button</span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </x-jet-secondary-button>
                <div>
                    <input wire:model="qty" x-bind:disabled="!$wire.stock" type="number"
                        class="bg-stone-50 w-14 text-center appearance-none border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-2 focus:ring-stone-200 focus:border-stone-300 disabled:opacity-25 block transition-shadow px-2.5 py-2.5"
                        min="1" max="{{ $stock }}" placeholder="1" required>
                </div>
                <x-jet-secondary-button wire:click="increment" class="py-3"
                    wire:loading.attr="disabled"
                    wire:target="increment"
                    x-bind:disabled="$wire.qty >= $wire.stock">
                    <span class="sr-only">Quantity button</span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                </x-jet-secondary-button>
            </div>

            <x-jet-button class="w-full justify-center py-3" x-bind:disabled="!$wire.stock">Agregar al carrito</x-jet-button>
        </div>
    </div>
</div>
