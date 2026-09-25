<!DOCTYPE html>
<html>
<head><title>Informasi</title></head>
<body>
    <h1>Informasi</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <p><a href="{{ route('rw.informasi.create') }}">+ Tambah Informasi</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Status</th><th>Dibuat Oleh</th><th>Aksi</th></tr>
        @foreach ($informasi as $i => $info)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->tanggal?->format('d/m/Y') }}</td>
                <td>{{ $info->status }}</td>
                <td>{{ $info->user->name ?? '-' }}</td>
                <td>
                    <a href="{{ route('rw.informasi.edit', $info->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.informasi.destroy', $info->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>