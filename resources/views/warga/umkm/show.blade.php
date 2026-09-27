<!DOCTYPE html>
<html>
<head><title>Detail UMKM</title></head>
<body>
    <h1>Detail UMKM</h1>
    <p><a href="{{ route('warga.umkm.index') }}">← Kembali</a></p>

    <table border="1" cellpadding="8">
        <tr><td>Nama Usaha</td><td>{{ $umkm->nama_usaha }}</td></tr>
        <tr><td>Kategori</td><td>{{ $umkm->kategori->nama_kategori }}</td></tr>
        <tr><td>Deskripsi</td><td>{{ $umkm->deskripsi }}</td></tr>
        <tr><td>Alamat</td><td>{{ $umkm->alamat }}</td></tr>
        <tr><td>WhatsApp</td><td>{{ $umkm->whatsapp }}</td></tr>

        @if ($umkm->foto)
            <tr>
                <td>Foto</td>
                <td><img src="{{ asset('storage/' . $umkm->foto) }}" width="300"></td>
            </tr>
        @else
            <tr><td>Foto</td><td><i>Tidak ada foto</i></td></tr>
        @endif

        <tr><td>Status</td><td>{{ $umkm->status }}</td></tr>
    </table>
</body>
</html>