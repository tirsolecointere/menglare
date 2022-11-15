<x-jet-dropdown width="96">
    <x-slot name="trigger">
        <button wire:loading.class="opacity-75" class="relative flex items-center justify-center w-10 h-10 bg-white rounded-full">
            <x-icons.cart size="6" />
            @if (Cart::count())
                <div class="inline-flex absolute -top-1.5 -right-1.5 justify-center items-center w-5 h-5 text-[11px] leading-none font-bold text-white bg-red-500 rounded-full border-1 border-white">{{ Cart::count() }}</div>
            @endif
        </button>
    </x-slot>
    <x-slot name="content">
        <div class="text-stone-700 p-4">
            <ul class="space-y-3">
                @forelse (Cart::content() as $item)
                    <li class="flex text-stone-600 gap-4">
                        <div class="flex-shrik-0">
                            <img class="w-20 aspect-square object-cover object-center rounded-md" src="{{ $item->options->image }}" alt="">
                        </div>
                        <div class="flex-grow flex flex-col gap-2">
                            <div>
                                <h1 class="font-semibold">{{ $item->name }}</h1>
                                <div class="font-bold">${{ $item->price }}</div>
                            </div>
                            <div class="flex items-end justify-between mt-auto">
                                <ul class="text-sm text-stone-500 flex-grow-1">
                                    @isset($item->options['color'])
                                        <li>Color: {{ $item->options['color'] }}</li>
                                    @endisset
                                    @isset($item->options['size'])
                                        <li>Tamaño: {{ $item->options['size'] }}</li>
                                    @endisset
                                </ul>
                                <div class="text-sm text-stone-500 flex-shrink-0">Cantidad : {{ $item->qty }}</div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="py-8">
                        <p class="text-center text-gray-400 text-sm">No hay ningun articulo en el carrito. </p>
                    </li>
                @endforelse
            </ul>


            @if (Cart::count())
            <div class="grid gap-2 mt-6">
                <div class="text-sm space-y-1 mb-2">
                    <div class="flex items-center justify-between gap-2"><span>Subtotal:</span> <span>{{ Cart::subtotal() }}</span></div>
                    <div class="flex items-center justify-between gap-2"><span>Total:</span> <b>{{ Cart::total() }}</b></div>
                </div>
                <x-jet-button href="{{ route('cart') }}" type="link" class="justify-center w-full">Ver carrito</x-jet-button>
                <x-jet-secondary-button wire:click="clearCart" class="justify-center w-full">Limpiar carrito</x-jet-secondary-button>
            </div>
            @endif
        </div>
    </x-slot>
</x-jet-dropdown>
