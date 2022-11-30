<header class="bg-lime-100 text-emerald-800 shadow-sm shadow-emerald-900/10 sticky top-0 z-[1020]" x-data="navMenu()">
    <div class="container flex items-center h-16 gap-6">
        {{-- Categories trigger --}}
        <button type="button" class="bg-lime-200 hover:bg-lime-300 flex flex-col items-center justify-center h-full px-4 leading-none"
            @click="show()"
            :class="{
                'bg-white hover:bg-white' : open,
                'bg-lime-200' : !open
            }">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
            </svg>
            <span class="block uppercase font-bold text-xs">Menu</span>
        </button>

        <div class="flex items-center flex-grow py-2 gap-4 lg:gap-10">

            {{-- Logo --}}
            <a href="/" class="block">
                <h1 class="uppercase font-bold">Menglare</h1>
            </a>

            {{-- Search bar --}}
            @livewire('search')

            {{-- Action icons --}}
            <div class="flex items-center gap-2">
                {{-- Account icon --}}
                <div class="relative">
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex text-sm border-2 border-white rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-9 w-9 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400"> {{ Auth::user()->name }} </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}"> Perfil </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('orders.index') }}"> Historial </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <x-jet-dropdown-link href="{{ route('admin.index') }}"> Panel de Admin. </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"> Salir </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center justify-center w-10 h-10 bg-white rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-jet-dropdown-link href="{{ route('login') }}"> {{ __('Login') }} </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('register') }}"> {{ __('Register') }} </x-jet-dropdown-link>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </div>

                {{-- Cart icon --}}
                @livewire('dropdown-cart')
            </div>

        </div>
    </div>

    <nav class="fixed top-16 left-0 right-0 bottom-0 z-30 pb-16" x-show="open">

        <div class="absolute inset-0 bg-black bg-opacity-25"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="transform opacity-0"
            x-transition:enter-end="transform opacity-100"
            x-transition:leave="transition linear duration-100 origin-bottom"
            x-transition:leave-start="transform opacity-100"
            x-transition:leave-end="transform opacity-0"
            x-show="open"></div>

        <div class="container h-full">
            <div class="relative grid grid-cols-4 h-full bg-white shadow-2xl rounded-b-xl overflow-hidden"
                @click.away="close()"
                x-transition:enter="transition ease-out duration-200 origin-top"
                x-transition:enter-start="transform opacity-0 scale-y-95"
                x-transition:enter-end="transform opacity-100 scale-y-100"
                x-transition:leave="transition linear duration-100 origin-top"
                x-transition:leave-start="transform opacity-100 scale-y-100"
                x-transition:leave-end="transform opacity-0 scale-y-95"
                x-show="open">
                <ul class="bg-white pt-4">
                    @foreach ($categories as $category)
                        <li class="navigation__link text-emerald-800 hover:bg-lime-300">
                            <a href="{{ route('categories.show', $category) }}" class=" | flex items-center font-semibold py-2 px-4">
                                <span class="block text-center w-9">{!! $category->icon !!}</span>
                                {{ $category->name }}
                            </a>

                            <div class="navigation__submenu | bg-lime-50 absolute w-3/4 top-0 right-0 h-full z-10 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="col-span-3 bg-lime-50">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>
        </div>
    </nav>
</header>
