<!DOCTYPE html>
<html>
<head><title>Kegiatan</title></head>
<body>
    <h1>Kegiatan</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('rw.kegiatan.index') }}">
        <input type="text" name="search" placeholder="Cari nama kegiatan..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('rw.kegiatan.index') }}">Reset</a>
    </form>

    <p><a href="{{ route('rw.kegiatan.create') }}">+ Tambah Kegiatan</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama</th><th>Tanggal</th><th>Waktu</th><th>Lokasi</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($kegiatan as $i => $k)
            <tr>
                <td>{{ $kegiatan->firstItem() + $i }}</td>
                <td>{{ $k->nama_kegiatan }}</td>
                <td>{{ $k->tanggal?->format('d/m/Y') }}</td>
                <td>{{ $k->waktu_mulai }} - {{ $k->waktu_selesai }}</td>
                <td>{{ $k->lokasi }}</td>
                <td>{{ $k->status }}</td>
                <td>
                    <a href="{{ route('rw.kegiatan.edit', $k->id) }}">Edit</a>
                    <form method="POST" action="{{ route('rw.kegiatan.destroy', $k->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                        @csrf @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $kegiatan->links() }}
</body>
</html>