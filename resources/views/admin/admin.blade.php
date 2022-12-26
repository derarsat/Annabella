<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
<div class="grid grid-cols-5 gap-8 text-dark font-Drive">
    <div class="min-h-screen bg-dark text-white">
        <h1 class="text-2xl py-6 border-b border-white px-4 border-opacity-50">Annabella</h1>
        <div class="flex flex-col ">
            <a class="px-4 py-3 hover:bg-primary text-lg" href="{{route("gallery-images.index")}}"> Gallery Images</a>
            <a class="px-4 py-3 hover:bg-primary text-lg" href="{{route("menus.index")}}"> Menus </a>
            <a class="px-4 py-3 hover:bg-primary text-lg" href="{{route("cuisines.index")}}"> Cuisines </a>
            <a class="px-4 py-3 hover:bg-primary text-lg" href="/admin/reservations"> Reservations</a>
            <a class="px-4 mt-20" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>
        </div>
    </div>
    <div class="col-span-4 ">
        <div class="container">
            @yield("content")

        </div>
    </div>
</div>
</body>
</html>
