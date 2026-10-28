<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard RW') — Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dashboard-shell min-h-screen font-sans antialiased">
    <div class="dashboard-background" aria-hidden="true">
        <img src="{{ asset('storage/hero/back.jpg') }}" alt="">
        <div class="dashboard-background-overlay"></div>
    </div>

    {{-- ==================== SIDEBAR ==================== --}}
    <aside class="dashboard-sidebar fixed inset-y-0 left-0 z-40 flex h-screen w-64 max-w-[85vw] flex-col bg-emerald-900 text-emerald-100" id="dashboard-sidebar" data-dashboard-role="rw">
        {{-- Logo --}}
        <div class="border-b border-white/15 px-4 py-5">
            <a href="{{ route('rw.dashboard') }}" class="flex flex-col gap-2.5">
                <span class="flex h-[4.5rem] items-center justify-center overflow-hidden px-3">
                    <img src="{{ asset('storage/logo/trimulyo.png') }}" alt="Logo Kampung Trimulyo" class="h-full w-auto max-w-full object-contain">
                </span>
                <span class="flex items-center justify-between gap-2 px-1">
                    <span class="text-sm font-semibold tracking-wide text-white">Kampung Trimulyo</span>
                    <span class="dashboard-role-badge">RW</span>
                </span>
            </a>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <a href="{{ route('rw.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.dashboard') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="home" /> Dashboard
            </a>
            <a href="{{ route('rw.rt.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.rt.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="building" /> Data RT
            </a>
            <a href="{{ route('rw.akun-rt.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.akun-rt.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="user" /> Akun RT
            </a>
            <a href="{{ route('rw.kas.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kas.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="wallet" /> Kas Semua RT
            </a>
            <a href="{{ route('rw.warga.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.warga.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="users" /> Data Warga
            </a>

            <div class="pt-3 pb-1 px-4 text-xs uppercase text-emerald-400 tracking-wider">Kategori</div>
            <a href="{{ route('rw.kategori-pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kategori-pengaduan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="folder" /> Kategori Pengaduan
            </a>
            <a href="{{ route('rw.kategori-umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kategori-umkm.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="tag" /> Kategori UMKM
            </a>

            <div class="pt-3 pb-1 px-4 text-xs uppercase text-emerald-400 tracking-wider">Konten</div>
            <a href="{{ route('rw.pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.pengaduan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="megaphone" /> Semua Pengaduan
            </a>
            <a href="{{ route('rw.umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.umkm.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="store" /> Semua UMKM
            </a>
            <a href="{{ route('rw.informasi.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.informasi.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="newspaper" /> Informasi
            </a>
            <a href="{{ route('rw.kegiatan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.kegiatan.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="calendar" /> Kegiatan
            </a>
            <a href="{{ route('rw.bendahara.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition {{ request()->routeIs('rw.bendahara.*') ? 'bg-emerald-800 text-white font-semibold' : '' }}">
                <x-icon name="briefcase" /> Kelola Bendahara
            </a>
        </nav>

        {{-- Bottom menu --}}
        <div class="border-t border-emerald-800 p-3 space-y-1">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition text-sm">
                <x-icon name="globe" /> Landing Page
            </a>
            <a href="{{ route('profile.change-password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-emerald-800 transition text-sm">
                <x-icon name="lock" /> Ganti Password
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-red-600 transition text-sm text-left">
                    <x-icon name="logout" /> Logout
                </button>
            </form>
        </div>
    </aside>
    <button type="button" class="dashboard-sidebar-backdrop fixed inset-0 z-30 bg-slate-950/50 opacity-0 pointer-events-none lg:hidden" data-dashboard-sidebar-backdrop aria-label="Tutup menu"></button>

    {{-- ==================== MAIN CONTENT ==================== --}}
    <div class="relative z-10 min-h-screen min-w-0 lg:ml-64">
        {{-- Topbar --}}
        <header class="dashboard-topbar sticky top-0 z-20">
            <div class="flex items-center gap-3 px-4 py-3 sm:px-6 sm:py-4">
                <button type="button" class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-white/70 bg-white/60 text-ink-700 shadow-sm transition hover:bg-white lg:hidden" data-dashboard-menu-toggle aria-controls="dashboard-sidebar" aria-expanded="false" aria-label="Buka menu">
                    <x-icon name="menu" />
                </button>
                <h1 class="min-w-0 flex-1 truncate text-lg font-bold text-gray-800 sm:text-xl">@yield('title', 'Dashboard')</h1>
                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">{{ Auth::user()->role }}</p>
                    </div>
                    <div class="dashboard-user-avatar w-10 h-10 rounded-full flex items-center justify-center font-bold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </header>

        {{-- Konten --}}
        <main class="dashboard-content p-4 sm:p-6 lg:p-8" data-dashboard-role="rw">
            @yield('content')
        </main>
    </div>

</body>
</html>