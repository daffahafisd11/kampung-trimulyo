<!DOCTYPE html>
<html>
<head><title>Detail Pengaduan</title></head>
<body>
    <h1>Detail Pengaduan</h1>
    <p><a href="{{ route('warga.pengaduan.index') }}">← Kembali</a></p>

    <table border="1" cellpadding="8">
        <tr><td>Judul</td><td>{{ $pengaduan->judul }}</td></tr>
        <tr><td>Kategori</td><td>{{ $pengaduan->kategori->nama_kategori }}</td></tr>
        <tr><td>Lokasi</td><td>{{ $pengaduan->lokasi }}</td></tr>
        <tr><td>Deskripsi</td><td>{{ $pengaduan->deskripsi }}</td></tr>

        {{-- Tampilkan foto kalau ada --}}
        @if ($pengaduan->foto)
            <tr>
                <td>Foto</td>
                <td>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" width="300" style="border:1px solid #ccc;">
                </td>
            </tr>
        @else
            <tr>
                <td>Foto</td>
                <td><i>Tidak ada foto</i></td>
            </tr>
        @endif

        <tr><td>Status</td><td>{{ $pengaduan->status }}</td></tr>
        <tr><td>Catatan</td><td>{{ $pengaduan->catatan ?? '-' }}</td></tr>
    </table>

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