<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard RW</title>
</head>
<body>
    <h1>Dashboard Super Admin RW</h1>
    <p>Selamat datang, {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
<!DOCTYPE html>
<html>
<head><title>Dashboard RW</title></head>
<body>
    <h1>Dashboard Super Admin RW</h1>
    <p>Halo, {{ Auth::user()->name }}</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Logout</button>
    </form>

    <hr>

    <h2>Menu</h2>
    <ul>
        <li><a href="{{ route('rw.rt.index') }}">Data RT</a></li>
        <li><a href="{{ route('rw.warga.index') }}">Data Warga</a></li>
        <li><a href="{{ route('rw.kategori-pengaduan.index') }}">Kategori Pengaduan</a></li>
        <li><a href="{{ route('rw.kategori-umkm.index') }}">Kategori UMKM</a></li>
        <li><a href="{{ route('rw.pengaduan.index') }}">Semua Pengaduan</a></li>
        <li><a href="{{ route('rw.umkm.index') }}">Semua UMKM</a></li>
        <li><a href="{{ route('rw.informasi.index') }}">Informasi</a></li>
        <li><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
    </ul>

    <h2>Statistik</h2>
    <ul>
        <li>Total Warga: {{ $stats['total_warga'] }}</li>
        <li>Total RT: {{ $stats['total_rt'] }}</li>
        <li>Total UMKM: {{ $stats['total_umkm'] }}</li>
        <li>Total Pengaduan: {{ $stats['total_pengaduan'] }}</li>
    </ul>
</body>
</html>
    <hr>

    <h2>Statistik Kampung</h2>
    <ul>
        <li>Total Warga: {{ $stats['total_warga'] }}</li>
        <li>Total RT: {{ $stats['total_rt'] }}</li>
        <li>Total UMKM: {{ $stats['total_umkm'] }}</li>
        <li>Total Pengaduan: {{ $stats['total_pengaduan'] }}</li>
        <li>Pengaduan Selesai: {{ $stats['pengaduan_selesai'] }}</li>
        <li>Pengaduan Diproses: {{ $stats['pengaduan_diproses'] }}</li>
        <li>Pengaduan Menunggu: {{ $stats['pengaduan_menunggu'] }}</li>
    </ul>
</body>
</html>