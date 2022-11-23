<div>
    <div class="py-6">
        <div class="container">
            <h1 class="text-xl font-semibold uppercase">Número de orden: Orden-{{ $order->id }}</h1>
        </div>
    </div>

    <div class="pb-8">
        <div class="container">
            <div class="grid grid-cols-6 gap-4 lg:gap-8">
                <div class="col-span-4 space-y-6">
                    <div class="bg-white rounded-lg p-4 lg:p-8">
                        <div class="grid lg:grid-cols-2 gap-4 lg:gap-16">
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

                    <div class="bg-white rounded-lg shadow-sm p-4 lg:p-8">
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
                <div class="col-span-2">
                    <div class="bg-white rounded-lg p-4 lg:p-8">
                        <div class="mb-6 lg:mb-8">
                            <h6 class="text-lg font-bold mb-4">Información de pago</h6>
                            <div class="flex items-center justify-between text-stone-500"><span>Subtotal:</span> <span>${{ $order->total - $order->shipping_cost }}</span></div>
                            <div class="flex items-center justify-between text-stone-500"><span>Costo de envío:</span> <span>${{ $order->shipping_cost }}</span></div>
                            <div class="flex items-center justify-between text-stone-500"><span>Total:</span> <b>${{ $order->total }}</b></div>
                        </div>

                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"></script>

<script>
    paypal.Buttons({
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: "{{ $order->total }}"
                    }
                }]
            });
        },
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(details) {
                Livewire.emit('payOrder')
            });
        }
    }).render('#paypal-button-container');
</script>
@endpush
