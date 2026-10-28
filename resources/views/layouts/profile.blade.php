<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil') — Kampung Trimulyo</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-sage-50 font-sans antialiased text-ink-800">

    {{-- TOPBAR --}}
    <header class="sticky top-0 z-30 border-b border-white/70 bg-white/80 shadow-[0_8px_32px_rgba(0,0,0,0.04)] backdrop-blur-xl">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-gray-700 hover:text-emerald-600 transition font-medium">
                <x-icon name="arrow-left" size="h-5 w-5" />
                <span>Kembali</span>
            </a>
            <div class="flex items-center gap-3">
                <div class="text-right">
                    <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 uppercase tracking-wide">{{ Auth::user()->role }}</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>
    </header>

    {{-- KONTEN --}}
    <main class="max-w-5xl mx-auto px-6 py-10 sm:py-12">
        @yield('content')
    </main>

</body>
</html>