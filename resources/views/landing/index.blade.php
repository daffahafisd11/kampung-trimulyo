<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</title>
</head>
<body>

    {{-- ==================== NAVBAR ==================== --}}
    <nav>
        <strong>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</strong>
        &nbsp;|&nbsp;
        <a href="#informasi">Informasi</a> |
        <a href="#kegiatan">Kegiatan</a> |
        <a href="#umkm">UMKM</a> |
        <a href="{{ route('login') }}">Login</a>
    </nav>

    <hr>

    {{-- ==================== HEADER ==================== --}}
    <h1>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</h1>
    <p>{{ $rw->alamat ?? '' }}</p>

    <hr>

    {{-- ==================== INFO KAMPUNG ==================== --}}
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

    {{-- ==================== INFORMASI ==================== --}}
    <section id="informasi">
        <h2>📢 Informasi & Pengumuman</h2>

        {{-- Form Search Informasi --}}
        <form method="GET" action="{{ route('landing') }}#informasi">
            <input type="text" name="search_informasi"
                   placeholder="Cari informasi..."
                   value="{{ $searchInformasi }}">
            <button type="submit">Cari</button>
            @if ($searchInformasi)
                <a href="{{ route('landing') }}#informasi">Reset</a>
            @endif
        </form>

        @if ($searchInformasi)
            <p><b>Hasil pencarian informasi:</b> "{{ $searchInformasi }}"
                ({{ $informasi->count() }} hasil)
            </p>
        @endif

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
    </section>

    <hr>

    {{-- ==================== KEGIATAN ==================== --}}
    <section id="kegiatan">
        <h2>🎉 Kegiatan Kampung</h2>

        {{-- Form Search Kegiatan --}}
        <form method="GET" action="{{ route('landing') }}#kegiatan">
            <input type="text" name="search_kegiatan"
                   placeholder="Cari kegiatan..."
                   value="{{ $searchKegiatan }}">
            <button type="submit">Cari</button>
            @if ($searchKegiatan)
                <a href="{{ route('landing') }}#kegiatan">Reset</a>
            @endif
        </form>

        @if ($searchKegiatan)
            <p><b>Hasil pencarian kegiatan:</b> "{{ $searchKegiatan }}"
                ({{ $kegiatan->count() }} hasil)
            </p>
        @endif

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
    </section>

    <hr>

    {{-- ==================== UMKM ==================== --}}
    <section id="umkm">
        <h2>🛒 UMKM Kampung</h2>

        {{-- Form Search UMKM --}}
        <form method="GET" action="{{ route('landing') }}#umkm">
            <input type="text" name="search_umkm"
                   placeholder="Cari UMKM..."
                   value="{{ $searchUmkm }}">
            <button type="submit">Cari</button>
            @if ($searchUmkm)
                <a href="{{ route('landing') }}#umkm">Reset</a>
            @endif
        </form>

        @if ($searchUmkm)
            <p><b>Hasil pencarian UMKM:</b> "{{ $searchUmkm }}"
                ({{ $umkm->count() }} hasil)
            </p>
        @endif

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
    </section>

    <hr>

    <footer>
        <p><small>&copy; {{ date('Y') }} {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</small></p>
    </footer>

</body>
</html>