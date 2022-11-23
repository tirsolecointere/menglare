<x-app-layout>
    <div class="py-8">
        <div class="container">
            <div class="grid lg:grid-cols-5">
                <a href="{{ route('orders.index') . '?status=1' }}" class="block bg-red-500 hover:bg-red-600 text-white transition rounded-l-lg px-12 py-8">
                    <div class="text-2xl font-bold mb-2">{{ $pending }}</div>
                    <div class="uppercase text-sm">Pendientes</div>
                </a>
                <a href="{{ route('orders.index') . '?status=2' }}" class="block bg-green-500 hover:bg-green-600 text-white transition px-12 py-8">
                    <div class="text-2xl font-bold mb-2">{{ $received }}</div>
                    <div class="uppercase text-sm">Recibidos</div>
                </a>
                <a href="{{ route('orders.index') . '?status=3' }}" class="block bg-amber-500 hover:bg-amber-600 text-white transition px-12 py-8">
                    <div class="text-2xl font-bold mb-2">{{ $shipped }}</div>
                    <div class="uppercase text-sm">Enviados</div>
                </a>
                <a href="{{ route('orders.index') . '?status=4' }}" class="block bg-cyan-500 hover:bg-cyan-600 text-white transition px-12 py-8">
                    <div class="text-2xl font-bold mb-2">{{ $delivered }}</div>
                    <div class="uppercase text-sm">Entregados</div>
                </a>
                <a href="{{ route('orders.index') . '?status=5' }}" class="block bg-slate-500 hover:bg-slate-600 text-white transition rounded-r-lg px-12 py-8">
                    <div class="text-2xl font-bold mb-2">{{ $canceled }}</div>
                    <div class="uppercase text-sm">Cancelado</div>
                </a>
            </div>
        </div>
    </div>

    <div class="pb-8">
        <div class="container">
            <div class="bg-white text-stone-800 rounded-lg">
                <div class="p-4 lg:p-8">
                    <h6 class="font-bold text-xl">Historial</h6>
                </div>

                <ul class="pb-8 divide-y divide-stone-100">
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{ route('orders.show', $order) }}" class="flex items-center justify-between gap-4 py-2 px-4 lg:px-8 hover:bg-stone-100 group">
                                <div>
                                    <div class="font-semibold group-hover:text-emerald-600">Orden: {{ $order->id }}</div>
                                    <div class="text-stone-400 text-sm">{{ $order->created_at->format('d/m/Y') }}</div>
                                </div>
                                <div class="ml-auto text-right">
                                    <div class="font-bold text-sm mt-2">$ {{ $order->total }}</div>
                                    @switch($order->status)
                                        @case(1)
                                            <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Pendiente</span>
                                            @break
                                        @case(2)
                                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Recibido</span>
                                            @break
                                        @case(3)
                                            <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded">Enviado</span>
                                            @break
                                        @case(4)
                                            <span class="bg-cyan-100 text-cyan-800 text-xs font-semibold px-2.5 py-0.5 rounded">Entregado</span>
                                            @break
                                        @case(5)
                                            <span class="bg-slate-100 text-slate-800 text-xs font-semibold px-2.5 py-0.5 rounded">Cancelado</span>
                                            @break
                                        @default
                                    @endswitch
                                </div>
                                <div class="text-stone-400 group-hover:text-stone-600 lg:ml-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5"> <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" /> </svg>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
