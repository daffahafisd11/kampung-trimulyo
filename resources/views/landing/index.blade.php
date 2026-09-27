<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</title>
</head>
<body>
    <h1>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</h1>
    <p>{{ $rw->alamat ?? '' }}</p>

    <p><a href="{{ route('login') }}">Login</a></p>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('landing') }}">
        <input type="text" name="search" placeholder="Cari informasi, kegiatan, atau UMKM..." value="{{ $search }}">
        <button type="submit">Cari</button>
        @if ($search)
            <a href="{{ route('landing') }}">Reset</a>
        @endif
    </form>

    @if ($search)
        <p>Hasil pencarian untuk: <b>{{ $search }}</b></p>
    @endif

    <hr>

    {{-- INFO KAMPUNG --}}
    <h2>Data Kampung</h2>
    <ul>
        <li>RW: {{ $rw->nama_rw ?? '-' }}</li>
        <li>Alamat: {{ $rw->alamat ?? '-' }}</li>
        <li>Jumlah RT: {{ $rt->count() }}</li>
    </ul>
    <p>Daftar RT:</p>
    <ul>
        @foreach ($rt as $r)
            <li>{{ $r->nama_rt }}</li>
        @endforeach
    </ul>

    <hr>

    {{-- INFORMASI --}}
    <h2>Informasi & Pengumuman</h2>
    @forelse ($informasi as $info)
        <div>
            <h3>{{ $info->judul }}</h3>
            <p>{{ $info->tanggal?->format('d/m/Y') }}</p>
            @if ($info->gambar)
                <img src="{{ asset('storage/' . $info->gambar) }}" width="200">
            @endif
            <p>{{ $info->isi }}</p>
        </div>
        <hr>
    @empty
        <p>Tidak ada informasi.</p>
    @endforelse

    <hr>

    {{-- KEGIATAN --}}
    <h2>Kegiatan Kampung</h2>
    @forelse ($kegiatan as $k)
        <div>
            <h3>{{ $k->nama_kegiatan }}</h3>
            <p>{{ $k->tanggal?->format('d/m/Y') }} | {{ $k->waktu_mulai }} - {{ $k->waktu_selesai }}</p>
            <p>Lokasi: {{ $k->lokasi }}</p>
            @if ($k->gambar)
                <img src="{{ asset('storage/' . $k->gambar) }}" width="200">
            @endif
            <p>{{ $k->deskripsi }}</p>
        </div>
        <hr>
    @empty
        <p>Tidak ada kegiatan.</p>
    @endforelse

    <hr>

    {{-- UMKM --}}
    <h2>UMKM Kampung</h2>
    @forelse ($umkm as $u)
        <div>
            <h3>{{ $u->nama_usaha }}</h3>
            <p>Kategori: {{ $u->kategori->nama_kategori }}</p>
            <p>Alamat: {{ $u->alamat }}</p>
            <p>WhatsApp: {{ $u->whatsapp }}</p>
            @if ($u->foto)
                <img src="{{ asset('storage/' . $u->foto) }}" width="200">
            @endif
            <p>{{ $u->deskripsi }}</p>
        </div>
        <hr>
    @empty
        <p>Tidak ada UMKM.</p>
    @endforelse

</body>
</html>