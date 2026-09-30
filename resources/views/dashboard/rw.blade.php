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
        <li><a href="{{ route('rw.akun-rt.index') }}">Akun RT</a></li>
        <li><a href="{{ route('rw.kas.index') }}">Kas Semua RT</a></li>
        <li><a href="{{ route('rw.warga.index') }}">Data Warga</a></li>
        <li><a href="{{ route('rw.kategori-pengaduan.index') }}">Kategori Pengaduan</a></li>
        <li><a href="{{ route('rw.kategori-umkm.index') }}">Kategori UMKM</a></li>
        <li><a href="{{ route('rw.pengaduan.index') }}">Semua Pengaduan</a></li>
        <li><a href="{{ route('rw.umkm.index') }}">Semua UMKM</a></li>
        <li><a href="{{ route('rw.bendahara.index') }}">Kelola Bendahara</a></li>
        <li><a href="{{ route('rw.informasi.index') }}">Informasi</a></li>
        <li><a href="{{ route('rw.kegiatan.index') }}">Kegiatan</a></li>
        <li><a href="{{ route('profile.change-password') }}">🔒 Ganti Password</a></li>
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