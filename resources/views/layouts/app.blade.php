<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Menglare') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="relative min-h-screen bg-lime-50/50 font-sans antialiased">
    <x-jet-banner />

    @livewire('navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    @stack('modals')

    @livewireScripts

    <script>
        // open/close categories
        function navMenu() {
            return {
                open: false,
                show() {
                    if(this.open) {
                        this.open = false;
                        document.getElementsByTagName('html')[0].style.overflow = 'auto';
                    } else {
                        this.open = true;
                        document.getElementsByTagName('html')[0].style.overflow = 'hidden';
                    }
                },
                close() {
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto';
                }
            }
        }
    </script>

    @stack('scripts')
</body>
</html>
