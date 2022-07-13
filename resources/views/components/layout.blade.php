<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LRVL</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="container font-nunito bg-slate-900 text-slate-200">
    <header class="py-8 flex justify-between items-center">
        <a href="/" class="text-rose-600 text-2xl font-bold">LRVL</a>

        <div class="flex gap-2 relative" x-data="{ open: false }">
            @auth
                <button @click="open = !open"
                    class="font-semibold border border-slate-700 flex items-center gap-1 px-5 py-2 rounded-md focus:bg-slate-800 hover:bg-slate-800 transition-colors">
                    <span>{{ auth()->user()->name }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <div x-show="open" x-cloak x-transition @click.outside="open = false"
                    class="rounded-md border border-slate-700 bg-slate-800 absolute top-11 right-0 p-4 space-y-4 shadow">
                    <a href="/profile">Profile</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </div>
            @endauth

            @guest
                <a href="/login"
                    class="bg-transparent px-5 py-2 rounded-md w-fit hover:opacity-90 hover:bg-slate-800 transition-all flex items-center">Log
                    in</a>
                <a href="/signup"
                    class="bg-rose-700 px-5 py-2 rounded-md w-fit hover:opacity-90 transition-opacity flex items-center">Sign
                    up</a>
            @endguest
        </div>
    </header>

    {{ $slot }}

    <footer class="mt-6 py-8">
        <p class="text-center text-slate-500">Made by Hung Duong Quang</p>
    </footer>
</body>

</html>
