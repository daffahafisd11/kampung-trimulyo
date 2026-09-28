<!DOCTYPE html>
<html>
<head><title>UMKM RT</title></head>
<body>
    <h1>UMKM di RT Saya</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('rt.umkm.index') }}">
        <input type="text" name="search" placeholder="Cari nama usaha..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('rt.umkm.index') }}">Reset</a>
    </form>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Nama Usaha</th><th>Warga</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($umkm as $i => $u)
            <tr>
                <td>{{ $umkm->firstItem() + $i }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->warga->nama_lengkap }}</td>
                <td>{{ $u->kategori->nama_kategori }}</td>
                <td>{{ $u->status }}</td>
                <td>
                    @if ($u->status === 'menunggu_verifikasi')
                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" style="display:inline">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="disetujui">
                            <button>Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" style="display:inline">
                            @csrf @method('PUT')
                            <input type="hidden" name="status" value="ditolak">
                            <button>Tolak</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $umkm->links() }}
</body>
</html>