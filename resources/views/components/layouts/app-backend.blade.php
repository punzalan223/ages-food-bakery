<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div>
            <div class="relative pb-32 overflow-hidden bg-slate-700">
                <!-- Menu open: "bg-slate-900", Menu closed: "bg-transparent" -->
                @livewire('components.backend.navbar')
                <!-- Menu open: "bottom-0", Menu closed: "inset-y-0" -->
                <div aria-hidden="true" class="absolute inset-x-0 inset-y-0 w-full overflow-hidden transform -translate-x-1/2 left-1/2 lg:inset-y-0">
                    {{-- <div class="absolute inset-0 flex">
                        <div class="w-1/2 h-full" style="background-color: #334155"></div> <!-- Slate-700 -->
                        <div class="w-1/2 h-full" style="background-color: #1e293b"></div> <!-- Slate-800 -->
                    </div> --}}
                    <div class="relative flex justify-center">
                        <svg class="shrink-0" width="1750" height="308" viewBox="0 0 1750 308">
                            {{-- <path d="M284.161 308H1465.84L875.001 182.413 284.161 308z" fill="#64748b" /> <!-- Slate-500 --> --}}
                            {{-- <path d="M1465.84 308L16.816 0H1750v308h-284.16z" fill="#1e293b" /> <!-- Slate-800 --> --}}
                            <path d="M1733.19 0L284.161 308H0V0h1733.19z" fill="#334155" /> <!-- Slate-700 -->
                            <path d="M875.001 182.413L1733.19 0H16.816l858.185 182.413z" fill="#475569" /> <!-- Slate-600 -->
                        </svg>
                    </div>
                </div>
                <header class="relative py-10">
                    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-white capitalize">
                            {{ Request::segment(1) }}
                        </h1>
                    </div>
                </header>
            </div>
        
            <main class="relative -mt-32">
                <div class="max-w-screen-xl px-4 pb-6 mx-auto sm:px-6 lg:px-8 lg:pb-16">
                    <div class="p-8 overflow-hidden bg-white rounded-lg shadow">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
