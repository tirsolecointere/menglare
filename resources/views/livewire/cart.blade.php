<section class="bg-white py-8">
    <div class="container">
        <h1 class="text-2xl font-bold mb-4">Carrito</h1>

        @if (Cart::count())
            <table class="table-auto text-stone-700 w-full mb-6">
                <thead>
                    <tr>
                        <td class="p-2 font-bold">&nbsp;</td>
                        <td class="p-2 font-bold">Precio</td>
                        <td class="p-2 font-bold text-center">Cantidad</td>
                        <td class="p-2 font-bold text-right">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                        <tr>
                            <td class="p-2">
                                <div class="flex text-stone-600 gap-4">
                                    <div class="flex-shrik-0">
                                        <img class="w-14 aspect-square object-cover object-center rounded-md" src="{{ $item->options->image }}" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <h1 class="font-semibold">{{ $item->name }}</h1>
                                        <div class="flex items-end">
                                            <ul class="text-sm text-stone-500 flex-grow-1">
                                                @isset($item->options['color'])
                                                    <li class="mr-2">Color: {{ $item->options['color'] }}</li>
                                                @endisset
                                                @isset($item->options['size'])
                                                    <li class="mr-2">Tamaño: {{ $item->options['size'] }}</li>
                                                @endisset
                                            </ul>
                                            <div class="text-sm text-stone-500 flex-shrink-0">Cantidad: {{ $item->qty }}</div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2">
                                <div class="flex items-center">
                                    <button class="text-red-500 p-1 bg-red-50 hover:bg-red-100 rounded-md mr-4"
                                        wire:click="delete('{{ $item->rowId }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5"> <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" /> </svg>
                                    </button>
                                    <span class="font-bold">${{ $item->price }}</span>
                                </div>
                            </td>
                            <td class="text-center p-2">
                                <div class="flex justify-center">
                                    @if ($item->options->size)
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                    @elseif($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                    @endif
                                </div>
                            </td>
                            <td class="text-right p-2">
                                ${{ $item->price * $item->qty }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <x-jet-secondary-button wire:click="destroy">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /> </svg>
                Vaciar carrito de compras
            </x-jet-secondary-button>
        @else
            <div class="py-8">
                <p class="text-gray-400 text-sm mb-4">No hay ningun articulo en el carrito. </p>

                <x-jet-secondary-button type="link" href="{{ route('home') }}">Volver al inicio</x-jet-secondary-button>
            </div>
        @endif

        <hr class="my-8">

        <div class="flex justify-end items-center gap-4">
            <div>Total:  <b>${{ Cart::subTotal() }}</b></div>
            <x-jet-button>Ir a Checkout</x-jet-button>
        </div>

    </div>
</div>
