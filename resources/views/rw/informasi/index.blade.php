<!DOCTYPE html>
<html>
<head><title>Informasi</title></head>
<body>
    <h1>Informasi</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('rw.informasi.index') }}">
        <input type="text" name="search" placeholder="Cari judul..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="dipublikasikan" {{ request('status') == 'dipublikasikan' ? 'selected' : '' }}>Dipublikasikan</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('rw.informasi.index') }}">Reset</a>
    </form>

    <p><a href="{{ route('rw.informasi.create') }}">+ Tambah Informasi</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Judul</th><th>Tanggal</th><th>Status</th><th>Dibuat Oleh</th><th>Aksi</th></tr>
        @forelse ($informasi as $i => $info)
            <tr>
                <td>{{ $informasi->firstItem() + $i }}</td>
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
        @empty
            <tr><td colspan="6">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $informasi->links() }}
</body>
</html>