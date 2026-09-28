<!DOCTYPE html>
<html>
<head><title>Pengaduan Saya</title></head>
<body>
    <h1>Pengaduan Saya</h1>
    <p><a href="{{ route('warga.dashboard') }}">← Dashboard</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @if (session('error')) <p style="color:red">{{ session('error') }}</p> @endif

    <form method="GET" action="{{ route('warga.pengaduan.index') }}">
        <input type="text" name="search" placeholder="Cari judul..." value="{{ request('search') }}">
        <select name="status">
            <option value="">Semua Status</option>
            <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
            <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
        </select>
        <button type="submit">Cari</button>
        <a href="{{ route('warga.pengaduan.index') }}">Reset</a>
    </form>

    <p><a href="{{ route('warga.pengaduan.create') }}">+ Buat Pengaduan</a></p>

    <table border="1" cellpadding="8">
        <tr><th>No</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Aksi</th></tr>
        @forelse ($pengaduan as $i => $p)
            <tr>
                <td>{{ $pengaduan->firstItem() + $i }}</td>
                <td>{{ $p->judul }}</td>
                <td>{{ $p->kategori->nama_kategori }}</td>
                <td>{{ $p->status }}</td>
                <td>
                    <a href="{{ route('warga.pengaduan.show', $p->id) }}">Lihat</a>
                    @if ($p->status === 'menunggu_verifikasi')
                        | <a href="{{ route('warga.pengaduan.edit', $p->id) }}">Edit</a>
                        <form method="POST" action="{{ route('warga.pengaduan.destroy', $p->id) }}" style="display:inline" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button>Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Tidak ada data.</td></tr>
        @endforelse
    </table>

    <br>
    {{ $pengaduan->links() }}
</body>
</html>