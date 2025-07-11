<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Toko Batik</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        <link rel="stylesheet" href="{{ asset('build/assets/app-CulmFTX2.css') }}">
<script src="{{ asset('build/assets/app-Cbvi_I5T.js') }}" defer></script>
    </head>
    <body>
        <livewire:header />
        <livewire:hero-section />
        <livewire:product-section />
        <livewire:footer />
    </body>
</html>
