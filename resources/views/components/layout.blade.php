<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LRVL</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="container font-nunito bg-slate-900 text-slate-200 relative">
    <x-nav />

    {{ $slot }}

    <x-footer />
</body>

</html>
