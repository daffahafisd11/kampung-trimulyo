<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Kategori Pengaduan</title></head>
<body>
    <h1>Kategori Pengaduan</h1>
    <p><a href="{{ route('rw.dashboard') }}">&larr; Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('rw.kategori-pengaduan.create') }}">+ Tambah Kategori</a></p>
    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr>
        @foreach ($kategori as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>{{ $item->deskripsi ?? '-' }}</td>
                <td>
                    <a href="{{ route('rw.kategori-pengaduan.edit', $item) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.kategori-pengaduan.destroy', $item) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>