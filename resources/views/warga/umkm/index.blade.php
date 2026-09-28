<!DOCTYPE html>
<html>
<head><title>UMKM Saya</title></head>
<body>
    <h1>UMKM Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('warga.umkm.index') }}">
        <input type="text" name="search" placeholder="Cari nama usaha..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('warga.umkm.index') }}">Reset</a>
    </form>

    <p><a href="{{ route('warga.umkm.create') }}">+ Daftarkan UMKM</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama Usaha</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($umkm as $i => $u)
            <tr>
                <td>{{ $umkm->firstItem() + $i }}</td>
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
        @empty
            <tr><td colspan="5">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $umkm->links() }}
</body>
</html>