<x-app-layout>
    @foreach ($categories as $category)
        @livewire('category-slider', ['category' => $category])
    @endforeach
</x-app-layout>
