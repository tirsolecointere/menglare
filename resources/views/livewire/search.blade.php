<div class="relative flex-grow flex" x-data>

    {{-- search input --}}
    <form action="{{ route('search') }}" class="flex-grow flex" autocomplete="off">
        <x-jet-input wire:model.delay.400ms="search" @focus="$wire.open = true" type="text" name="q" class="flex-grow h-10 rounded-tr-none rounded-br-none" placeholder="Buscar..." />
        <x-jet-button class="rounded-top !p-1 flex items-center justify-center w-10 h-10 rounded-tl-none rounded-bl-none" title="Buscar">
            <x-icons.search size="6" />
        </x-jet-button>
    </form>

    {{-- results dropdown --}}
    <div class="absolute top-full left-0 w-full bg-white text-stone-700 rounded-b-md shadow-lg max-h-[80vh] overflow-auto p-1 hidden"
        :class="{'hidden': !$wire.open}" @click.outside="$wire.open = false">
        <ul>
            @forelse ($products as $product)
                <li>
                    <a href="{{ route('products.show', $product) }}" class="flex text-stone-600 gap-4 hover:bg-lime-50 rounded-lg p-3">
                        <div class="flex-shrik-0">
                            <img class="w-14 aspect-square object-cover object-center rounded-md" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        </div>
                        <div class="leading-tight">
                            <div class="text-stone-500 text-xs">{{ $product->subcategory->category->name }}</div>
                            <h1 class="font-semibold mb-1">{{ $product->name }}</h1>
                            <div class="font-bold">${{ $product->price }}</div>
                        </div>
                    </a>
                </li>
            @empty
                <li class="text-stone-500 text-sm p-3">No se han encontrado resultados.</li>
            @endforelse
        </ul>
    </div>
</div>
