@props(['category'])

<div class="grid grid-cols-4 gap-4 p-6 h-full">
    <div>
        <h5 class="text-green-900 font-bold text-lg mb-4">Subcategorías</h5>
        <ul>
            @foreach ($category->subcategories as $subcategory)
                <li>
                    <a href="" class="inline-block font-semibold hover:text-lime-600 mb-2">{{ $subcategory->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
    </div>
</div>
