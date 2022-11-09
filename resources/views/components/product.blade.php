@props(['product', 'type' => 'grid'])

@if ($type == 'grid')
    <article class="bg-white rounded-lg">
        <div class="p-2">
            <a href="{{ route('products.show', $product) }}" class="block hover:opacity-60 transition-opacity duration-150">
                <img class="w-full aspect-[4/3] object-cover object-center rounded" src="{{ Storage::url($product->images->first()->url) }}" alt="">
            </a>
        </div>
        <div class="px-3 pb-3">
            <h1 class="inline-bock font-semibold text-sm truncate">
                <a href="{{ route('products.show', $product) }}" class="text-stone-600 hover:text-emerald-700">{{ $product->name }}</a>
            </h1>
            <div class="font-bold text-sm">${{ $product->price }}</div>
        </div>
    </article>
@elseif($type == 'list')
    <article class="sm:flex sm:items-stretch rounded-lg bg-stone-50 mb-4">
        <a href="{{ route('products.show', $product) }}" class="block w-full sm:w-40 lg:w-48 xl:w-60 aspect-square rounded-lg sm:rounded-none sm:rounded-l-lg overflow-hidden flex-shrink-0 hover:opacity-60 transition-opacity duration-150">
            <img class="h-full w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
        </a>
        <div class="p-5 flex-1">
            <h1 class="inline-bock text-lg lg:text-xl font-semibold mb-1">
                <a href="{{ route('products.show', $product) }}" class="text-stone-600 hover:text-emerald-700">{{ $product->name }}</a>
            </h1>
            <div class="flex divide-x mb-1">
                <div class="text-xs text-stone-400 pr-2" title="Categoría">{{ $product->subcategory->name }}</div>
                <div class="text-xs text-stone-400 pl-2" title="Marca">{{ $product->brand->name }}</div>
            </div>
            <div class="text-stone-500 my-2">{{ $product->description }}</div>
            <div class="font-bold text-lg">${{ $product->price }}</div>

            <div class="mt-4">
                <x-jet-button class="px-10">Comprar</x-jet-button>
            </div>
        </div>
    </article>
@endif
