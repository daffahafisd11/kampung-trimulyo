<!DOCTYPE html>
<html>
<head><title>Semua UMKM</title></head>
<body>
    <h1>Semua UMKM</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama Usaha</th><th>Warga</th><th>RT</th><th>Kategori</th><th>Status</th></tr>
        @foreach ($umkm as $i => $u)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->warga->nama_lengkap }}</td>
                <td>{{ $u->warga->rt->nama_rt ?? '-' }}</td>
                <td>{{ $u->kategori->nama_kategori }}</td>
                <td>{{ $u->status }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>