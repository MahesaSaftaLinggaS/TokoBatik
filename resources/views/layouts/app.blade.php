<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'My E-commerce Site' }}</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-white shadow p-4">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold">My E-commerce Site</h1>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-4">
        {{ $slot }}
    </main>

    <footer class="bg-white shadow p-4 text-center text-sm text-gray-600">
        &copy; {{ date('Y') }} My E-commerce Site. All rights reserved.
    </footer>

    @livewireScripts
</body>
</html>
