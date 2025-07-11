<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    @livewireStyles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Dashboard</h1>
            <nav>
                <a href="{{ route('dashboard') }}" class="mr-4 hover:underline">Dashboard</a>
                <a href="{{ route('products') }}" class="mr-4 hover:underline">Products</a>
                <a href="{{ route('orders') }}" class="mr-4 hover:underline">Orders</a>
                <a href="{{ route('logout') }}" class="hover:underline">Logout</a>
            </nav>
        </div>
    </header>

    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center text-sm">
        &copy; {{ date('Y') }} Admin Dashboard
    </footer>

    @livewireScripts
</body>
</html>
