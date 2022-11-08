<x-app-layout>
    <div class="container">
        @foreach ($categories as $category)
            @livewire('category-slider', ['category' => $category])
        @endforeach
    </div>
</x-app-layout>
