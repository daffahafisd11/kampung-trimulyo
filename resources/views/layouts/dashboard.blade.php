<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard RW') — Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- ==================== SIDEBAR ==================== --}}
    <aside class="fixed left-0 top-0 h-screen w-64 bg-emerald-900 text-emerald-100 flex flex-col z-40">
        {{-- Logo --}}
        <div class="px-6 py-5 border-b border-emerald-800">
            <a href="{{ route('rw.dashboard') }}" class="flex items-center gap-2">
                <span class="text-lg font-extrabold text-white">KAMPUNG</span>
                <span class="text-xs text-emerald-300 tracking-widest">RW</span>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <a href="{{ route('rw.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.dashboard') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>🏠</span> Dashboard
            </a>
            <a href="{{ route('rw.rt.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.rt.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>🏘️</span> Data RT
            </a>
            <a href="{{ route('rw.akun-rt.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.akun-rt.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>👤</span> Akun RT
            </a>
            <a href="{{ route('rw.kas.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kas.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>💰</span> Kas Semua RT
            </a>
            <a href="{{ route('rw.warga.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.warga.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>👥</span> Data Warga
            </a>

            <div class="pt-3 pb-1 px-4 text-xs uppercase text-emerald-400 tracking-wider">Kategori</div>
            <a href="{{ route('rw.kategori-pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kategori-pengaduan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>📂</span> Kategori Pengaduan
            </a>
            <a href="{{ route('rw.kategori-umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kategori-umkm.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>🏷️</span> Kategori UMKM
            </a>

            <div class="pt-3 pb-1 px-4 text-xs uppercase text-emerald-400 tracking-wider">Konten</div>
            <a href="{{ route('rw.pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.pengaduan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>📢</span> Semua Pengaduan
            </a>
            <a href="{{ route('rw.umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.umkm.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>🛒</span> Semua UMKM
            </a>
            <a href="{{ route('rw.informasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.informasi.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>📰</span> Informasi
            </a>
            <a href="{{ route('rw.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kegiatan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>🎉</span> Kegiatan
            </a>
            <a href="{{ route('rw.bendahara.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.bendahara.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <span>💼</span> Kelola Bendahara
            </a>
        </nav>

        {{-- Bottom menu --}}
        <div class="border-t border-emerald-800 p-3 space-y-1">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition text-sm">
                <span>🌐</span> Landing Page
            </a>
            <a href="{{ route('profile.change-password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition text-sm">
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

    {{-- ==================== MAIN CONTENT ==================== --}}
    <div class="ml-64">
        {{-- Topbar --}}
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <div class="px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
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

        {{-- Konten --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>