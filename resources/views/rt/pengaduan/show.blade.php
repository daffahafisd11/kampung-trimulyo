<!DOCTYPE html>
<html>
<head><title>Detail Pengaduan</title></head>
<body>
    <h1>Detail Pengaduan</h1>
    <p><a href="{{ route('rt.pengaduan.index') }}">← Kembali</a></p>

    @if (session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @if ($errors->any()) <div style="color:red">@foreach ($errors->all() as $e) <p>{{ $e }}</p> @endforeach</div> @endif

    <table border="1" cellpadding="8">
        <tr><td>Warga</td><td>{{ $pengaduan->warga->nama_lengkap }}</td></tr>
        <tr><td>Judul</td><td>{{ $pengaduan->judul }}</td></tr>
        <tr><td>Kategori</td><td>{{ $pengaduan->kategori->nama_kategori }}</td></tr>
        <tr><td>Lokasi</td><td>{{ $pengaduan->lokasi }}</td></tr>
        <tr><td>Deskripsi</td><td>{{ $pengaduan->deskripsi }}</td></tr>
        <tr><td>Status</td><td>{{ $pengaduan->status }}</td></tr>
        <tr><td>Catatan</td><td>{{ $pengaduan->catatan ?? '-' }}</td></tr>
    </table>

    <h2>Ubah Status</h2>
    <form method="POST" action="{{ route('rt.pengaduan.updateStatus', $pengaduan->id) }}">
        @csrf @method('PUT')
        <p>
            <label>Status Baru</label><br>
            <select name="status" required>
                <option value="">-- Pilih --</option>
                <option value="diterima">Diterima</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </p>
        <p><label>Catatan</label><br><textarea name="catatan"></textarea></p>
        <button>Simpan</button>
    </form>

    <h2>Riwayat</h2>
    <table border="1" cellpadding="8">
        <tr><th>Waktu</th><th>Status</th><th>Catatan</th><th>Oleh</th></tr>
        @foreach ($pengaduan->riwayat as $r)
            <tr>
                <td>{{ $r->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $r->status }}</td>
                <td>{{ $r->catatan ?? '-' }}</td>
                <td>{{ $r->user->name ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>