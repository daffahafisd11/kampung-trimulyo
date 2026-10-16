<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Bendahara') — Kampung Trimulyo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">

    <aside class="fixed left-0 top-0 h-screen w-64 bg-amber-800 text-amber-100 flex flex-col z-40">
        <div class="px-6 py-5 border-b border-amber-700">
            <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-2">
                <span class="text-lg font-extrabold text-white">KAMPUNG</span>
                <span class="text-xs text-amber-300 tracking-widest">BENDAHARA</span>
            </a>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            {{-- Menu Warga --}}
            <div class="pt-1 pb-1 px-4 text-xs uppercase text-amber-400 tracking-wider">Warga</div>
            <a href="{{ route('warga.dashboard') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition">
                <span>🏠</span> Dashboard Warga
            </a>
            <a href="{{ route('warga.pengaduan.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition">
                <span>📢</span> Pengaduan Saya
            </a>
            <a href="{{ route('warga.umkm.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition">
                <span>🛒</span> UMKM Saya
            </a>
            <a href="{{ route('warga.profile.edit') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition">
                <span>👤</span> Profil Saya
            </a>

            {{-- Menu Bendahara --}}
            <div class="pt-3 pb-1 px-4 text-xs uppercase text-amber-400 tracking-wider">Bendahara</div>
            <a href="{{ route('bendahara.kas.index') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition {{ request()->routeIs('bendahara.kas.index') ? 'bg-amber-700 text-white font-semibold' : '' }}">
                <span>💰</span> Kas RT
            </a>
            <a href="{{ route('bendahara.kas.create') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition {{ request()->routeIs('bendahara.kas.create') ? 'bg-amber-700 text-white font-semibold' : '' }}">
                <span>➕</span> Catat Transaksi
            </a>
        </nav>

        <div class="border-t border-amber-700 p-3 space-y-1">
            <a href="{{ route('landing') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition text-sm">
                <span>🌐</span> Landing Page
            </a>
            <a href="{{ route('profile.change-password') }}" class="flex items-center gap-3 px-4 py-2.5 rounded-lg hover:bg-amber-700 transition text-sm">
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

    <div class="ml-64">
        <header class="bg-white shadow-sm sticky top-0 z-30">
            <div class="px-6 py-4 flex items-center justify-between">
                <h1 class="text-xl font-bold text-gray-800">@yield('title', 'Dashboard Bendahara')</h1>
                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide">
                            Bendahara {{ Auth::user()->rt->nama_rt ?? 'RT' }}
                        </p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-amber-600 text-white flex items-center justify-center font-bold">
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