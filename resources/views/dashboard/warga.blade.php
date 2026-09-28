<!DOCTYPE html>
<html>
<head><title>Dashboard Warga</title></head>
<body>
    <h1>Dashboard Warga</h1>
    <p>Halo, {{ $warga->nama_lengkap }}</p>

    @if (Auth::user()->is_bendahara)
        <p><b>Status: Bendahara RT {{ Auth::user()->rt->nama_rt ?? '-' }}</b></p>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <h2>Menu</h2>
    <ul>
        {{-- Menu untuk semua warga --}}
        <li><a href="{{ route('warga.pengaduan.index') }}">Pengaduan Saya</a></li>
        <li><a href="{{ route('warga.umkm.index') }}">UMKM Saya</a></li>
        <li><a href="{{ route('warga.kas.index') }}">Kas RT</a></li>
        <li><a href="{{ route('warga.profile.edit') }}">Profil Saya</a></li>
        <li><a href="{{ route('profile.change-password') }}">🔒 Ganti Password</a></li>

        {{-- Menu TAMBAHAN khusus bendahara --}}
        @if (Auth::user()->is_bendahara)
            <li><a href="{{ route('bendahara.dashboard') }}">💰 Kelola Kas RT (Bendahara)</a></li>
        @endif
    </ul>

    <h2>Statistik</h2>
    <ul>
        <li>Pengaduan Saya: {{ $stats['total_pengaduan'] }}</li>
        <li>UMKM Saya: {{ $stats['total_umkm'] }}</li>
    </ul>
</body>
</html>