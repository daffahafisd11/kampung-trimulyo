<!DOCTYPE html>
<html>
<head><title>Informasi RT</title></head>
<body>
    <h1>Informasi</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('rt.informasi.index') }}">
        <input type="text" name="search" placeholder="Cari judul..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
        <a href="{{ route('rt.informasi.index') }}">Reset</a>
    </form>

    <p><a href="{{ route('rt.informasi.create') }}">+ Tambah Informasi</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($informasi as $i => $info)
            <tr>
                <td>{{ $informasi->firstItem() + $i }}</td>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->tanggal?->format('d/m/Y') }}</td>
                <td>{{ $info->status }}</td>
                <td>
                    <a href="{{ route('rt.informasi.edit', $info->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rt.informasi.destroy', $info->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $informasi->links() }}
</body>
</html>