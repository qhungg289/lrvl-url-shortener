<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LRVL</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
</head>

<body class="container font-nunito bg-slate-900 text-slate-200">
    <header class="py-8">
        <a href="/" class="text-rose-600 text-2xl font-bold">LRVL</a>
    </header>

    {{ $slot }}
</body>

</html>
