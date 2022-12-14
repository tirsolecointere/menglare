<div class="flex items-center space-x-2" x-data>
    <x-jet-secondary-button wire:click="decrement" class="px-3" disabled
        wire:loading.attr="disabled"
        wire:target="decrement"
        x-bind:disabled="$wire.qty <= 1">
        <span class="sr-only">Quantity button</span>
        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </x-jet-secondary-button>
    <div>
        <input wire:model="qty" x-bind:disabled="!$wire.stock" type="number"
            class="bg-stone-50 w-14 text-center appearance-none border border-stone-300 text-stone-900 text-sm rounded-lg focus:ring-2 focus:ring-stone-200 focus:border-stone-300 disabled:opacity-25 block transition-shadow px-2.5"
            min="1" max="{{ $stock }}" placeholder="1" readonly required>
    </div>
    <x-jet-secondary-button wire:click="increment" class="px-3"
        wire:loading.attr="disabled"
        wire:target="increment"
        x-bind:disabled="$wire.qty >= $wire.stock">
        <span class="sr-only">Quantity button</span>
        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
    </x-jet-secondary-button>
</div>
