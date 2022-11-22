<section class="py-8">
    <div class="container">
        <div class="grid grid-cols-12 gap-4 xl:gap-12">
            <div class="col-span-8">
                <div class="bg-white rounded-lg p-8 mb-4">
                    <div class="mb-6">
                        <x-jet-label>Nombre y apellido</x-jet-label>
                        <x-jet-input wire:model.defer="contact" type="text" placeholder="Nombre"></x-jet-input>
                        <div class="text-xs text-stone-400 mt-1">Nombre de la persona que recibirá el producto.</div>
                        <x-jet-input-error for="contact" />
                    </div>
                    <div class="">
                        <x-jet-label>Teléfono de contacto</x-jet-label>
                        <x-jet-input wire:model.defer="phone" type="text" placeholder="Nombre"></x-jet-input>
                        <x-jet-input-error for="phone" />
                    </div>
                </div>
                <div class="bg-white rounded-lg p-8 mb-4" x-data="{ shipping_type: @entangle('shipping_type') }">
                    <h6 class="block font-bold mb-4">Envíos</h6>
                    <div class="grid gap-1">
                        <div>
                            <label class="bg-stone-50 hover:bg-stone-100 p-4 flex items-center gap-3 cursor-pointer">
                                <input x-model="shipping_type" type="radio" name="shipping_type" value="1" class="text-emerald-600 focus:ring-1 focus:ring-emerald-400">
                                <div>
                                    Recoger en tienda
                                    <div class="text-xs text-stone-500">Calle Lorem Ipsum, Dolor 123 11230</div>
                                </div>
                                <span class="font-semibold text-sm text-emerald-600 ml-auto">Gratis</span>
                            </label>
                        </div>
                        <div>
                            <label class="bg-stone-50 hover:bg-stone-100 p-4 flex gap-3 cursor-pointer">
                                <input x-model="shipping_type" type="radio" name="shipping_type" value="2" class="text-emerald-600 focus:ring-1 focus:ring-emerald-400">
                                <span>Envío a domicilio</span>
                            </label>
                            <div class="bg-stone-50 border-t rounded-b-lg p-4 hidden" :class="{ 'hidden': shipping_type != 2 }">
                                <div class="grid grid-cols-3 gap-4 bg-white rounded p-4">
                                    {{-- Departments --}}
                                    <div>
                                        <x-jet-label value="Departamento" />
                                        <select wire:model="department_id" name="" id="" class="block w-full border-stone-200 focus:border-stone-300 focus:ring-2 focus:ring-stone-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="" disabled selected>Seleccione...</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="department_id" />
                                    </div>

                                    {{-- Cities --}}
                                    <div>
                                        <x-jet-label value="Ciudad" />
                                        <select wire:model="city_id" wire:loading.attr="disabled" wire:target="department_id" class="block w-full border-stone-200 focus:border-stone-300 focus:ring-2 focus:ring-stone-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="" disabled selected>Seleccione...</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="city_id" />
                                    </div>

                                    {{-- Districts --}}
                                    <div>
                                        <x-jet-label value="Distrito" />
                                        <select wire:model="district_id" wire:loading.attr="disabled" wire:target="city_id" class="block w-full border-stone-200 focus:border-stone-300 focus:ring-2 focus:ring-stone-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                            <option value="" disabled selected>Seleccione...</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-jet-input-error for="district_id" />
                                    </div>

                                    <div class="col-span-2">
                                        <x-jet-label value="Dirección" />
                                        <x-jet-input wire:model="address" type="text" placeholder="Escriba..."></x-jet-input>
                                        <x-jet-input-error for="address" />
                                    </div>
                                    <div class="">
                                        <x-jet-label value="Referencia" />
                                        <x-jet-input wire:model="reference" type="text" placeholder="Escriba..."></x-jet-input>
                                        <x-jet-input-error for="reference" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <x-jet-button wire:click="create_order"
                        wire:loading.attr="disabled"
                        wire:target="create_order">
                        Continuar con la compra
                    </x-jet-button>
                </div>

                <hr class="my-6">

                <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quaerat laudantium quod nesciunt reprehenderit sit?</p>

            </div>

            <div class="col-span-4">
                <ul class="space-y-3">
                    @forelse (Cart::content() as $item)
                        <li class="flex text-stone-600 gap-4">
                            <div class="flex-shrik-0">
                                <img class="w-20 aspect-square object-cover object-center rounded-md" src="{{ $item->options->image }}" alt="">
                            </div>
                            <div class="flex-grow flex flex-col gap-2">
                                <div>
                                    <h1 class="font-semibold">{{ $item->name }}</h1>
                                    <div class="font-bold">${{ $item->price }}</div>
                                </div>
                                <div class="flex items-end justify-between mt-auto">
                                    <ul class="text-sm text-stone-500 flex-grow-1">
                                        @isset($item->options['color'])
                                            <li>Color: {{ $item->options['color'] }}</li>
                                        @endisset
                                        @isset($item->options['size'])
                                            <li>Tamaño: {{ $item->options['size'] }}</li>
                                        @endisset
                                    </ul>
                                    <div class="text-sm text-stone-500 flex-shrink-0">Cantidad : {{ $item->qty }}</div>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="py-8">
                            <p class="text-center text-gray-400 text-sm">No hay ningun articulo en el carrito. </p>
                        </li>
                    @endforelse
                </ul>

                <hr class="my-4">

                <div class="text-sm space-y-1 mb-2">
                    <div class="flex items-center justify-between gap-2"><span>Subtotal:</span> <span>$ {{ Cart::subtotal() }}</span></div>
                    <div class="flex items-center justify-between gap-2"><span>Envío:</span> <span>{{ $shipping_type == 1 || $shipping_cost == 0 ? 'Gratis' : '$ ' . $shipping_cost }}</span></div>
                    <div class="flex items-center justify-between gap-2"><span>Total:</span> <b>$ {{ $shipping_type == 1 ? Cart::subtotal() : Cart::subtotal() + $shipping_cost }}</b></div>
                </div>
            </div>
        </div>
    </div>
</div>
