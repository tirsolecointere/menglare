<div class="grid grid-cols-5 gap-4 divide-x divide-gray-100">

    <aside class="">
        <div class="mb-6">
            <h6 class="uppercase text-sm mb-3 text-stone-400">Subcategorías</h6>
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li class="mb-1">
                        <a href="javascript:void(0)" wire:click.prevent="$set('subcategoryFilter', '{{ $subcategory->name }}')"
                            class="inline-block font-semibold text-green-900 hover:text-emerald-600 {{ $subcategoryFilter== $subcategory->name ? 'text-emerald-600 pl-2' : '' }}">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mb-6">
            <h6 class="uppercase text-sm mb-3 text-stone-400">Marcas</h6>
            <ul>
                @foreach ($category->brands as $brand)
                    <li class="mb-1">
                        <a href="javascript:void(0)" wire:click.prevent="$set('brandFilter', '{{ $brand->name }}')"
                            class="inline-block font-semibold text-green-900 hover:text-emerald-600 {{ $brandFilter == $brand->name ? 'text-emerald-600 pl-2' : '' }}">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <x-jet-secondary-button wire:click="cleanFilters">Resetear filtros</x-jet-secondary-button>
    </aside>

    <div class="col-span-4 pl-4">
        {{-- category actions --}}
        <div class="flex items-center justify-between mb-4">
            <div class="text-sm text-stone-400 italic">@if($subcategoryFilter) <span>{{ $subcategoryFilter}} -</span> @endif @if($brandFilter) <span>{{ $brandFilter }} -</span> @endif {{ $products->count() }} Productos</div>

            <div class="grid grid-cols-2 gap-1 ml-auto shrink-0">
                <button wire:click="$set('view', 'grid')" type="button"
                    class="p-2 text-green-900 rounded transition {{ $view == 'grid' ? 'bg-lime-200' : 'bg-stone-50 hover:bg-lime-100' }}" title="Mostrar en grilla">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" /> </svg>
                </button>
                <button wire:click="$set('view', 'list')" type="button"
                    class="p-2 text-green-900 rounded transition {{ $view == 'list' ? 'bg-lime-200' : 'bg-stone-50 hover:bg-lime-100' }}" title="Mostrar en lista">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /> </svg>
                </button>
            </div>
        </div>

        {{-- category products --}}
        @if ($view == 'grid')
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-3 md:gap-8">
                @foreach ($products as $product)
                    <article class="bg-white">
                        <div class="">
                            <img class="w-full aspect-[4/3] object-cover object-center rounded" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        </div>
                        <div class="py-3">
                            <div class="flex justify-between mb-1">
                                <div class="text-xs text-stone-400" title="Categoría">{{ $product->subcategory->name }}</div>
                                <div class="text-xs text-stone-400" title="Marca">{{ $product->brand->name }}</div>
                            </div>
                            <h1 class="inline-bock font-semibold text-sm truncate">{{ $product->name }}</h1>
                            <div class="font-bold text-sm">${{ $product->price }}</div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            @foreach ($products as $product)
                <article class="sm:flex sm:items-stretch rounded-lg bg-stone-50 mb-4">
                    <a href="#" class="block w-full sm:w-40 lg:w-48 xl:w-60 aspect-square rounded-lg sm:rounded-none sm:rounded-l-lg overflow-hidden flex-shrink-0">
                        <img class="h-full w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                    </a>
                    <div class="p-5 flex-1">
                        <h1 class="inline-bock text-lg lg:text-xl font-semibold mb-1">{{ $product->name }}</h1>
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
            @endforeach
        @endif

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>
