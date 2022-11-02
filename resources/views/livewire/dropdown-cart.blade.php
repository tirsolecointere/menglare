<x-jet-dropdown width="96">
    <x-slot name="trigger">
        <button class="relative flex items-center justify-center w-10 h-10 bg-white rounded-full">
            <x-icons.cart size="6" />
            <div class="inline-flex absolute -top-1.5 -right-1.5 justify-center items-center w-5 h-5 text-[11px] leading-none font-bold text-white bg-red-500 rounded-full border-1 border-white">6</div>
        </button>
    </x-slot>
    <x-slot name="content">
        <div class="py-4 px-6">
            <p class="text-gray-400 text-sm">No hay ningun articulo en el carrito. </p>
        </div>
    </x-slot>
</x-jet-dropdown>
