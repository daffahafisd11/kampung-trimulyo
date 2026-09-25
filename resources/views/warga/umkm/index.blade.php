<!DOCTYPE html>
<html>
<head><title>UMKM Saya</title></head>
<body>
    <h1>UMKM Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('warga.umkm.create') }}">+ Daftarkan UMKM</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama Usaha</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @foreach ($umkm as $i => $u)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->kategori->nama_kategori }}</td>
                <td>{{ $u->status }}</td>
                <td>
                    <a href="{{ route('warga.umkm.show', $u->id) }}">Lihat</a>
                    | <a href="{{ route('warga.umkm.edit', $u->id) }}">Edit</a>
                    <form method="POST" action="{{ route('warga.umkm.destroy', $u->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>