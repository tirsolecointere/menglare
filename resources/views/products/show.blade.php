<x-app-layout>
    <section class="bg-white py-8">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-10">
                <div class="md:col-span-6 xl:col-span-5">
                    {{-- product image --}}
                    <div class="js-product-img | swiper mb-4">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $img)
                                <div class="swiper-slide">
                                    <img class="w-full select-none" src="{{ Storage::url($img->url) }}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    {{-- thumbs --}}
                    <div class="js-product-img-thumbs | swiper">
                        <div class="swiper-wrapper">
                            @foreach ($product->images as $img)
                                <button type="button" class="swiper-slide transition-opacity opacity-40">
                                    <img class="w-full" src="{{ Storage::url($img->url) }}" alt="">
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="md:col-span-6 xl:col-span-7">
                    <div class="text-stone-800">
                        <div class="flex justify-between gap-3 mb-3">
                            <h1 class="text-3xl font-bolb flex-grow">{{ $product->name }}</h1>
                            <div class="flex items-center text-sm text-stone-400 gap-1 flex-shrink-0">
                                <div>
                                    Marca: <a href="" class="hover:underline">{{ $product->brand->name }}</a>
                                </div>
                                <a href="" class="inline-flex items-center gap-2 group hover:bg-yellow-50 rounded-full pl-2">
                                    <span class="group-hover:text-yellow-500">39 reseñas</span>
                                    <div class="inline-flex items-center justify-center text-xs bg-stone-50 group-hover:bg-yellow-200/50 rounded-full w-9 h-9">
                                        <b class="group-hover:text-yellow-500">5</b>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-[1.25em] h-[1.25em] text-yellow-400"> <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" /> </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="font-bold text-xl text-emerald-800">${{ $product->price }}</div>

                        <div class="my-3">
                            <p class="leading-6">{{ $product->description }}</p>
                        </div>

                        <div class="flex p-3 text-sm bg-white shadow-md shadow-emerald-800/10 rounded-lg my-8">
                            <svg class="text-emerald-600 flex-shrink-0 inline w-6 h-6 mr-3" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /> </svg>
                            <div class="flex-grow">
                                <div class="font-bold text-emerald-600">Se hacen envíos a toda Venezuela!</div>
                                <div>Recíbelo el {{  Date::now()->addDays(5)->locale('es')->format('l j \de F') }}</div>
                            </div>
                        </div>

                        @if ($product->subcategory->size)
                            @livewire('add-cart-item-size', ['product' => $product])
                        @elseif($product->subcategory->color)
                            @livewire('add-cart-item-color', ['product' => $product])
                        @else
                            @livewire('add-cart-item', ['product' => $product])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
