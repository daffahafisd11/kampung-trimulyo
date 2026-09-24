<!DOCTYPE html>
<html>
<head><title>Kategori UMKM</title></head>
<body>
    <h1>Kategori UMKM</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('rw.kategori-umkm.create') }}">+ Tambah Kategori</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama</th><th>Aksi</th></tr>
        @foreach ($kategori as $i => $k)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $k->nama_kategori }}</td>
                <td>
                    <a href="{{ route('rw.kategori-umkm.edit', $k->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.kategori-umkm.destroy', $k->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>