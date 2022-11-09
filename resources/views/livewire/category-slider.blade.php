<section class="py-8">
    <div class="container">
        <div class="flex justify-between items-baseline gap-4">
            <h1 class="text-xl text-green-900 font-bold uppercase mb-4">{{ $category->name }}</h1>
            <a href="{{ route('categories.show', $category) }}" class="inline-block font-semibold text-green-800/75 hover:text-green-800">Ver más</a>
        </div>

        <div wire:init="loadProducts">
            @if (count($products))
                <div class="category__swiper | swiper">
                    <div class="swiper-wrapper">
                        @foreach ($products as $product)
                        <div class="swiper-slide">
                            <x-product :product="$product" type="grid"></x-product>
                        </div>
                        @endforeach
                    </div>

                    {{-- <div class="swiper-pagination"></div> --}}

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            @else
                <div class="grid grid-cols-5 gap-10">
                    <div role="status" class="max-w-sm animate-pulse">
                        <div class="flex justify-center items-center w-full h-48 bg-green-900/25 rounded mb-3">
                            <svg class="w-12 h-12 text-white/50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[360px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[330px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[60px] mt-6"></div>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div role="status" class="max-w-sm animate-pulse">
                        <div class="flex justify-center items-center w-full h-48 bg-green-900/25 rounded mb-3">
                            <svg class="w-12 h-12 text-white/50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[360px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[330px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[60px] mt-6"></div>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div role="status" class="max-w-sm animate-pulse">
                        <div class="flex justify-center items-center w-full h-48 bg-green-900/25 rounded mb-3">
                            <svg class="w-12 h-12 text-white/50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[360px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[330px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[60px] mt-6"></div>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div role="status" class="max-w-sm animate-pulse">
                        <div class="flex justify-center items-center w-full h-48 bg-green-900/25 rounded mb-3">
                            <svg class="w-12 h-12 text-white/50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[360px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[330px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[60px] mt-6"></div>
                        <span class="sr-only">Loading...</span>
                    </div>
                    <div role="status" class="max-w-sm animate-pulse">
                        <div class="flex justify-center items-center w-full h-48 bg-green-900/25 rounded mb-3">
                            <svg class="w-12 h-12 text-white/50" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
                        </div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[360px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[330px] mb-2.5"></div>
                        <div class="h-2 bg-green-900/25 rounded-full max-w-[60px] mt-6"></div>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
