<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil') — Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- TOPBAR --}}
    <header class="bg-white shadow-sm sticky top-0 z-30">
        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url()->previous() }}" class="flex items-center gap-2 text-gray-700 hover:text-emerald-600 transition font-medium">
                <span class="text-xl">←</span>
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
    <main class="max-w-5xl mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>