<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard RT') — Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- SIDEBAR --}}
    <aside class="fixed left-0 top-0 h-screen w-64 bg-teal-800 text-teal-100 flex flex-col z-40">
        <div class="px-6 py-5 border-b border-teal-700">
            <a href="{{ route('rt.dashboard') }}" class="flex items-center gap-2">
                <span class="text-lg font-extrabold text-white">KAMPUNG</span>
                <span class="text-xs text-teal-300 tracking-widest">RT</span>
            </a>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <a href="{{ route('rt.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.dashboard') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>🏠</span> Dashboard
            </a>
            <a href="{{ route('rt.warga.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.warga.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>👥</span> Data Warga
            </a>
            <a href="{{ route('rt.kas.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.kas.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>💰</span> Kas RT
            </a>
            <a href="{{ route('rt.pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.pengaduan.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>📢</span> Pengaduan
            </a>
            <a href="{{ route('rt.umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.umkm.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>🛒</span> UMKM
            </a>
            <a href="{{ route('rt.informasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.informasi.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>📰</span> Informasi
            </a>
            <a href="{{ route('rt.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition {{ request()->routeIs('rt.kegiatan.*') ? 'bg-teal-700 text-white font-semibold' : '' }}">
                <span>🎉</span> Kegiatan
            </a>
        </nav>

        <div class="border-t border-teal-700 p-3 space-y-1">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition text-sm">
                <span>🌐</span> Landing Page
            </a>
            <a href="{{ route('profile.change-password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-teal-700 transition text-sm">
                <span>🔒</span> Ganti Password
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-600 transition text-sm text-left">
                    <span>🚪</span> Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="ml-64">
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <div class="px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard RT')</h1>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">
                            RT: {{ Auth::user()->rt->nama_rt ?? '-' }}
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>