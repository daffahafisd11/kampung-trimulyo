<!DOCTYPE html>
<html>
<head><title>Pengaduan RT</title></head>
<body>
    <h1>Pengaduan Masuk</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Warga</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($pengaduan as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->warga->nama_lengkap ?? '-' }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori->nama_kategori }}</td>
                <td>{{ $p->status }}</td>
                <td><a href="{{ route('rt.pengaduan.show', $p->id) }}">Detail</a></td>
            </tr>
        @endforeach
    </table>
</body>
</html>