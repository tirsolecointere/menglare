<x-app-layout>

    <div class="py-8">
        <div class="container max-w-5xl">
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold uppercase">Número de orden: Orden-{{ $order->id }}</h1>
                    @if ($order->status == 1)
                        <x-jet-button href="{{ route('orders.payment', $order) }}" type="link">Pagar</x-jet-button>
                    @endif
                </div>

                <div class="bg-white shadow p-4 lg:p-8 rounded-lg">
                    <ol class="flex items-center">
                        <li class="relative flex-shrink-0 flex-grow basis-1/3 mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-emerald-200 ring-emerald-100' : 'bg-stone-200 ring-stone-100' }} | flex z-10 justify-center items-center w-8 h-8  rounded-full ring-0 sm:ring-8 shrink-0">
                                    <svg aria-hidden="true" class="{{ ($order->status >= 2 && $order->status != 5) ? 'text-emerald-600' : 'text-stone-500' }} w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"> <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" /> </svg>
                                </div>
                                <div class="hidden sm:flex w-full bg-stone-200 h-0.5"></div>
                            </div>
                            <div class="mt-3 sm:pr-8">
                                <h6 class="text-sm font-semibold text-stone-800">Recibido</h6>
                            </div>
                        </li>
                        <li class="relative flex-shrink-0 flex-grow basis-1/3 mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-emerald-200 ring-emerald-100' : 'bg-stone-200 ring-stone-100' }} | flex z-10 justify-center items-center w-8 h-8 rounded-full ring-0 sm:ring-8 shrink-0">
                                    <svg aria-hidden="true" class="{{ ($order->status >= 3 && $order->status != 5) ? 'text-emerald-600' : 'text-stone-500' }} w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"> <path d="M3.375 4.5C2.339 4.5 1.5 5.34 1.5 6.375V13.5h12V6.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM13.5 15h-12v2.625c0 1.035.84 1.875 1.875 1.875h.375a3 3 0 116 0h3a.75.75 0 00.75-.75V15z" /> <path d="M8.25 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0zM15.75 6.75a.75.75 0 00-.75.75v11.25c0 .087.015.17.042.248a3 3 0 015.958.464c.853-.175 1.522-.935 1.464-1.883a18.659 18.659 0 00-3.732-10.104 1.837 1.837 0 00-1.47-.725H15.75z" /> <path d="M19.5 19.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" /> </svg>
                                </div>
                                <div class="hidden sm:flex w-full bg-stone-200 h-0.5"></div>
                            </div>
                            <div class="mt-3 sm:pr-8">
                                <h6 class="text-sm font-semibold text-stone-900">Enviado</h6>
                            </div>
                        </li>
                        <li class="relative flex-shrink-0 flex-grow basis-1/3 mb-6 sm:mb-0">
                            <div class="flex items-center">
                                <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-emerald-200 ring-emerald-100' : 'bg-stone-200 ring-stone-100' }} | flex z-10 justify-center items-center w-8 h-8 rounded-full ring-0 sm:ring-8 shrink-0">
                                    <svg aria-hidden="true" class="{{ ($order->status >= 4 && $order->status != 5) ? 'text-emerald-600' : 'text-stone-500' }} w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"> <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z" clip-rule="evenodd" /> </svg>
                                </div>
                                <div class="hidden sm:flex w-full bg-stone-200 h-0.5"></div>
                            </div>
                            <div class="mt-3 sm:pr-8">
                                <h6 class="text-sm font-semibold text-stone-800">Entregado</h6>
                            </div>
                        </li>
                    </ol>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-4 lg:p-8">
                    <div class="grid lg:grid-cols-3 gap-4 lg:gap-16">
                        <div>
                            @if ($order->shipping_type == 1)
                                <div class="font-semibold uppercase text-sm mb-2">Recoger en tienda</div>
                                <div class="text-stone-500 leading-tight">Calle Falsa Lorem Ipsum, 123</div>
                            @else
                                <div class="font-semibold uppercase text-sm mb-2">Delivery a:</div>
                                <div class="text-stone-500 leading-tight">{{ $order->address }}, {{ $order->department->name }}, {{ $order->city->name }}, {{ $order->district->name }}.</div>
                                <div class="text-stone-500 leading-tight">{{ $order->reference }}</div>
                            @endif
                        </div>

                        <div>
                            <div class="font-semibold uppercase text-sm mb-2">Datos de contacto</div>
                            <div class="text-stone-500 leading-tight">{{ $order->contact }} <br> <a href="javascript:void(0)" class="text-emerald-500">{{ $order->phone }}</a></div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg p-4 lg:p-8">
                    <h6 class="text-lg font-bold mb-4">Resumen</h6>

                    <div class="overflow-auto">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <td class="p-2 font-bold">Artículo</td>
                                    <td class="p-2 font-bold">Precio</td>
                                    <td class="p-2 font-bold">Cantidad</td>
                                    <td class="p-2 font-bold text-right">Total</td>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="w-full p-2">
                                            <div class="flex text-stone-600 gap-4">
                                                <div class="flex-shrink-0">
                                                    <img class="w-14 aspect-square object-cover object-center rounded-md" src="{{ $item->options->image }}" alt="">
                                                </div>
                                                <div class="flex-grow">
                                                    <h1 class="font-semibold">{{ $item->name }}</h1>
                                                    <div class="flex items-end">
                                                        <ul class="text-sm text-stone-500 flex-grow-1">
                                                            @isset($item->options->color)
                                                                <li class="mr-2">Color: {{ $item->options->color }}</li>
                                                            @endisset
                                                            @isset($item->options->size)
                                                                <li class="mr-2">Tamaño: {{ $item->options->size }}</li>
                                                            @endisset
                                                        </ul>
                                                        <div class="text-sm text-stone-500 flex-shrink-0">Cantidad: {{ $item->qty }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2"> ${{ $item->price }} </td>
                                        <td class=" p-2"> {{ $item->qty }} </td>
                                        <td class="text-right p-2"> <b>${{ $item->price * $item->qty }}</b> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
