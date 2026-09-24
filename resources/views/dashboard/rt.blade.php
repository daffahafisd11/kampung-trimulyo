<!DOCTYPE html>
<html>
<head><title>Dashboard RT</title></head>
<body>
    <h1>Dashboard Admin RT</h1>
    <p>Halo, {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('rt.pengaduan.index') }}">Pengaduan Masuk</a></li>
        <li><a href="{{ route('rt.umkm.index') }}">UMKM</a></li>
        <li><a href="{{ route('rt.informasi.index') }}">Informasi</a></li>
        <li><a href="{{ route('rt.kegiatan.index') }}">Kegiatan</a></li>
    </ul>

    <h2>Statistik</h2>
    <ul>
        <li>Total Warga: {{ $stats['total_warga'] }}</li>
        <li>Pengaduan Masuk: {{ $stats['pengaduan_masuk'] }}</li>
    </ul>
</body>
</html>