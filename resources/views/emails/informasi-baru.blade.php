<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Informasi Baru</title>
</head>
<body>
    <h1>Informasi Baru dari Kampung Trimulyo</h1>

    <h2>{{ $informasi->judul }}</h2>
    <p><b>Tanggal:</b> {{ $informasi->tanggal?->format('d/m/Y') }}</p>

    @if ($informasi->gambar)
        <p>
            <img src="{{ asset('storage/' . $informasi->gambar) }}" width="300">
        </p>
    @endif

    <p>{{ $informasi->isi }}</p>

    <hr>
    <p>
        <a href="{{ route('landing') }}">Buka Landing Page</a>
    </p>
    <p><small>Email ini dikirim otomatis dari Sistem Kampung Trimulyo.</small></p>
</body>
</html>