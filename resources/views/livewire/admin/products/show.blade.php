<div>
    <x-slot name="header">
        <h1 class="font-bold text-lg">Lista de productos</h1>

        <x-jet-button href="{{ route('admin.products.create') }}" type="link" class="ml-auto">Nuevo producto</x-jet-button>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl container">
            <div class="bg-white">
                <div class="p-3">
                    <x-jet-input wire:model.delay.350ms="search" type="text" placeholder="Buscar..."></x-jet-input>
                </div>
                @if ($products->count())
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="text-left p-3 font-bold text-xs uppercase bg-stone-50 text-stone-400 hidden lg:table-cell">Nombre</th>
                                <th class="text-left p-3 font-bold text-xs uppercase bg-stone-50 text-stone-400 hidden lg:table-cell">Categoria</th>
                                <th class="text-left p-3 font-bold text-xs uppercase bg-stone-50 text-stone-400 hidden lg:table-cell">Status</th>
                                <th class="text-left p-3 font-bold text-xs uppercase bg-stone-50 text-stone-400 hidden lg:table-cell">Precio</th>
                                <th class="text-left p-3 font-bold text-xs uppercase bg-stone-50 text-stone-400 hidden lg:table-cell">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="lg:hover:bg-lime-50 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-stone-800 border-b block lg:table-cell">
                                        <div class="flex items-center text-stone-600 gap-4">
                                            <div class="flex-shrink-0">
                                                <img class="w-10 aspect-square object-cover object-center rounded-md" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                            </div>
                                            <div class="flex-grow">
                                                <h1 class="font-semibold">{{ $product->name }}</h1>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-stone-800 border-b block lg:table-cell">
                                        {{ $product->subcategory->category->name }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-stone-800 border-b block lg:table-cell">
                                        @switch($product->status)
                                                @case(0)
                                                    <span class="bg-slate-100 text-slate-800 text-xs font-semibold px-2.5 py-0.5 rounded">Borrador</span>
                                                    @break
                                                @case(1)
                                                    <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Publicado</span>
                                                    @break
                                                @default
                                        @endswitch
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-stone-800 border-b block lg:table-cell">
                                        ${{ $product->price }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-stone-800 border-b block lg:table-cell text-right">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="text-emerald-600 hover:text-emerald-800">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-stone-400 text-center p-6">
                        No se ha encontrado ningun registro.
                    </div>
                @endif
            </div>

            @if ($products->hasPages())
                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
