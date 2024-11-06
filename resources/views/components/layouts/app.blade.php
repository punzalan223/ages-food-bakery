<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite('resources/css/app.css')
    </head>
    <body class="h-full">
        {{ $slot }}
    </body>
</html>
