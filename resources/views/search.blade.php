<x-app-layout>
    <div class="py-8">
        <div class="container">
            <h1 class="text-2xl mb-6">Busqueda</h1>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-4 lg:gap-6">
                @forelse ($products as $product)
                    <x-product :product="$product"></x-product>
                @empty
                    <div class="text-stone-500">No se han encontrado resultados.</div>
                @endforelse
            </div>

            <div class="mt-8">
                @if ($products)
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
