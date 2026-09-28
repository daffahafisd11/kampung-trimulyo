<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kegiatan Baru</title>
</head>
<body>
    <h1>Kegiatan Baru dari Kampung Trimulyo</h1>

    <h2>{{ $kegiatan->nama_kegiatan }}</h2>
    <p><b>Tanggal:</b> {{ $kegiatan->tanggal?->format('d/m/Y') }}</p>
    <p><b>Waktu:</b> {{ $kegiatan->waktu_mulai }} - {{ $kegiatan->waktu_selesai }}</p>
    <p><b>Lokasi:</b> {{ $kegiatan->lokasi }}</p>

    @if ($kegiatan->gambar)
        <p>
            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" width="300">
        </p>
    @endif

    <p>{{ $kegiatan->deskripsi }}</p>

    <hr>
    <p>
        <a href="{{ route('landing') }}">Webiste Kampung Trimulyo</a>
    </p>
    <p><small>Email ini dikirim otomatis dari Sistem Kampung Trimulyo.</small></p>
</body>
</html>