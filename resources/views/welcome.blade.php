<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME', 'Menglare') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

    @livewireStyles

    @vite('resources/js/app.js')
</head>
<body>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 bg-lime-50 my-6 p-5 rounded-lg text-lime-800">
        <h1 class="text-3xl font-bold">Menglare</h1>
    </div>

    @livewireScripts
</body>
</html>
