<x-app-layout>
    {{-- Header --}}
    <header class="bg-lime-50/50 text-center py-12">
        <div class="container">
            <h1 class="text-3xl uppercase font-bold text-green-900">{{ $category->name }}</h1>
            <div class="text-green-900/75 font-semibold">{{ $category->products->count() }} Productos</div>
        </div>
    </header>

    {{-- Content --}}
    <section class="bg-white py-8">
        <div class="container">
            {{-- category img --}}
            <figure class="mb-8 overflow-hidden rounded-lg">
                <img class="w-full aspect-[12/1] object-cover object-center blur-lg scale-125" src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}">
            </figure>

            @livewire('category-filter', ['category' => $category])
        </div>
    </section>
</x-app-layout>
