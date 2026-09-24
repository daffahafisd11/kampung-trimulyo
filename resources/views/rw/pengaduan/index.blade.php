<!DOCTYPE html>
<html>
<head><title>Semua Pengaduan</title></head>
<body>
    <h1>Semua Pengaduan</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>RT</th><th>Warga</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($pengaduan as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->rt->nama_rt ?? '-' }}</td>
                <td>{{ $p->warga->nama_lengkap ?? '-' }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori->nama_kategori }}</td>
                <td>{{ $p->status }}</td>
                <td><a href="{{ route('rw.pengaduan.show', $p->id) }}">Detail</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>