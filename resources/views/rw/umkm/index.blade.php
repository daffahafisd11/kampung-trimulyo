<!DOCTYPE html>
<html>
<head><title>Semua UMKM</title></head>
<body>
    <h1>Semua UMKM</h1>
    <p><a href="{{ route('rw.dashboard') }}">← Dashboard</a></p>

    <form method="GET" action="{{ route('rw.umkm.index') }}">
        <input type="text" name="search" placeholder="Cari nama usaha..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('rw.umkm.index') }}">Reset</a>
    </form>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th><th>Nama Usaha</th><th>Warga</th><th>RT</th><th>Kategori</th><th>Status</th><th>Aksi</th>
        </tr>
        @forelse ($umkm as $i => $u)
            <tr>
                <td>{{ $umkm->firstItem() + $i }}</td>
                <td>{{ $u->nama_usaha }}</td>
                <td>{{ $u->warga->nama_lengkap }}</td>
                <td>{{ $u->warga->rt->nama_rt ?? '-' }}</td>
                <td>{{ $u->kategori->nama_kategori }}</td>
                <td>{{ $u->status }}</td>
                <td><a href="{{ route('rw.umkm.show', $u->id) }}">Detail</a></td>
            </tr>
        @empty
            <tr><td colspan="7">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $umkm->links() }}
</body>
</html>