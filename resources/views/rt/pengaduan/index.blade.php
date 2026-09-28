<!DOCTYPE html>
<html>
<head><title>Pengaduan RT</title></head>
<body>
    <h1>Pengaduan Masuk</h1>
    <p><a href="{{ route('rt.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif

    <form method="GET" action="{{ route('rt.pengaduan.index') }}">
        <input type="text" name="search" placeholder="Cari judul pengaduan..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('rt.pengaduan.index') }}">Reset</a>
    </form>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Warga</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($pengaduan as $i => $p)
            <tr>
                <td>{{ $pengaduan->firstItem() + $i }}</td>
                <td>{{ $p->warga->nama_lengkap ?? '-' }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori->nama_kategori }}</td>
                <td>{{ $p->status }}</td>
                <td><a href="{{ route('rt.pengaduan.show', $p->id) }}">Detail</a></td>
            </tr>
        @empty
            <tr><td colspan="6">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $pengaduan->links() }}
</body>
</html>