<!DOCTYPE html>
<html>
<head><title>Dashboard RT</title></head>
<body>
    <h1>Dashboard Admin RT</h1>
    <p>Halo, {{ Auth::user()->name }}</p>
    <p>RT: {{ $rt->nama_rt ?? '-' }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('rt.pengaduan.index') }}">Pengaduan Masuk</a></li>
        <li><a href="{{ route('rt.umkm.index') }}">UMKM</a></li>
        <li><a href="{{ route('rt.kas.index') }}">Kas RT</a></li>
        <li><a href="{{ route('rt.informasi.index') }}">Informasi</a></li>
        <li><a href="{{ route('rt.kegiatan.index') }}">Kegiatan</a></li>
        <li><a href="{{ route('rt.warga.index') }}">Data Warga</a></li>
        <li><a href="{{ route('profile.change-password') }}">🔒 Ganti Password</a></li>
    </ul>

    <h2>Statistik</h2>
    <ul>
        <li>Total Warga: {{ $stats['total_warga'] }}</li>
        <li>Pengaduan Masuk: {{ $stats['pengaduan_masuk'] }}</li>
    </ul>

    @if (isset($kas))
        <h2>Kas RT</h2>
        <ul>
            <li>Total Masuk: Rp {{ number_format($kas['total_masuk'], 0, ',', '.') }}</li>
            <li>Total Keluar: Rp {{ number_format($kas['total_keluar'], 0, ',', '.') }}</li>
            <li><b>Saldo: Rp {{ number_format($kas['saldo'], 0, ',', '.') }}</b></li>
        </ul>
    @endif
</body>
</html>