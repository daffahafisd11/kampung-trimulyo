<!DOCTYPE html>
<html>
<head><title>Detail UMKM</title></head>
<body>
    <h1>Detail UMKM</h1>
    <p><a href="{{ route('rw.umkm.index') }}">← Kembali</a></p>

    <table border="1" cellpadding="8">
        <tr><td>Nama Usaha</td><td>{{ $umkm->nama_usaha }}</td></tr>
        <tr><td>Pemilik</td><td>{{ $umkm->warga->nama_lengkap }}</td></tr>
        <tr><td>RT</td><td>{{ $umkm->warga->rt->nama_rt ?? '-' }}</td></tr>
        <tr><td>Kategori</td><td>{{ $umkm->kategori->nama_kategori }}</td></tr>
        <tr><td>Deskripsi</td><td>{{ $umkm->deskripsi }}</td></tr>
        <tr><td>Alamat</td><td>{{ $umkm->alamat }}</td></tr>
        <tr><td>WhatsApp</td><td>{{ $umkm->whatsapp }}</td></tr>
        <tr><td>Status</td><td>{{ $umkm->status }}</td></tr>
    </table>
</body>
</html>