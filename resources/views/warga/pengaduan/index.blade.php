<!DOCTYPE html>
<html>
<head><title>Pengaduan Saya</title></head>
<body>
    <h1>Pengaduan Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @if (session('error')) <p style="color:red">{{ session('error') }}</p> @endif

    <p><a href="{{ route('warga.pengaduan.create') }}">+ Buat Pengaduan</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($pengaduan as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori->nama_kategori }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('warga.pengaduan.show', $p->id) }}">Lihat</a>
                    @if ($p->status === 'menunggu_verifikasi')
                        | <a href="{{ route('warga.pengaduan.edit', $p->id) }}">Edit</a>
                        <form method="POST" action="{{ route('warga.pengaduan.destroy', $p->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button>Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>