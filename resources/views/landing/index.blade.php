<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $rw->nama_rw ?? 'Kampung Digital Trimulyo' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">

    {{-- ==================== NAVBAR FLOATING ==================== --}}
   <nav class="fixed top-4 left-0 right-0 z-50 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto bg-white/90 backdrop-blur-lg shadow-xl rounded-full px-6 py-3 border border-white/40">
        <div class="flex justify-between items-center">
            <a href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Kampung Digital" class="h-9 w-auto">
            </a>
            <div class="hidden md:flex items-center gap-2">
                <a href="#beranda" class="text-gray-700 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-full font-medium transition text-sm">Beranda</a>
                <a href="#tentang" class="text-gray-700 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-full font-medium transition text-sm">Tentang</a>
                <a href="#informasi" class="text-gray-700 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-full font-medium transition text-sm">Informasi</a>
                <a href="#kegiatan" class="text-gray-700 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-full font-medium transition text-sm">Kegiatan</a>
                <a href="#umkm" class="text-gray-700 hover:text-emerald-700 hover:bg-emerald-50 px-4 py-2 rounded-full font-medium transition text-sm">UMKM</a>
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-emerald-700 px-4 py-2 rounded-full font-medium transition text-sm ml-1">Login</a>
            </div>
        </div>
    </div>
</nav>

    {{-- ==================== HERO ==================== --}}
    <header id="beranda" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div>
        <div class="absolute inset-0 bg-emerald-950/50"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white py-32">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight drop-shadow-lg">
                {{ $rw->nama_rw ?? 'Kampung Digital Trimulyo RW II' }}
            </h1>
            <p class="text-lg md:text-xl text-emerald-100 mb-10 max-w-2xl mx-auto">
                {{ $rw->alamat ?? 'Satu platform untuk Informasi, Pengaduan, UMKM, dan Kegiatan warga' }}
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#informasi" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/20 transition shadow-lg">
                    Lihat Informasi
                </a>
                <a href="#umkm" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-8 py-3.5 rounded-full font-semibold hover:bg-white/20 transition shadow-lg">
                    Jelajahi UMKM
                </a>
            </div>
        </div>
    </header>

    {{-- ==================== TENTANG ==================== --}}
    <section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Tentang Kampung</h2>
            <p class="text-gray-600">Profil singkat wilayah kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow-md p-8 border-t-4 border-emerald-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center mb-4 text-2xl">🏘️</div>
                <p class="text-sm text-gray-500 mb-1">Nama RW</p>
                <p class="text-xl font-bold text-gray-900">{{ $rw->nama_rw ?? '-' }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-8 border-t-4 border-teal-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center mb-4 text-2xl">📍</div>
                <p class="text-sm text-gray-500 mb-1">Alamat</p>
                <p class="text-xl font-bold text-gray-900">{{ $rw->alamat ?? '-' }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-8 border-t-4 border-lime-600 hover:shadow-xl transition">
                <div class="w-12 h-12 bg-lime-100 rounded-full flex items-center justify-center mb-4 text-2xl">🏡</div>
                <p class="text-sm text-gray-500 mb-1">Jumlah RT</p>
                <p class="text-xl font-bold text-gray-900">{{ $rt->count() }} RT</p>
            </div>
        </div>

        <div class="mt-10 bg-emerald-50 rounded-2xl p-8">
            <h3 class="text-lg font-semibold mb-4 text-gray-900">Daftar RT</h3>
            <div class="flex flex-wrap gap-2">
                @foreach ($rt as $r)
                    <span class="bg-white text-emerald-800 px-5 py-2.5 rounded-full text-sm font-medium shadow-sm border border-emerald-100">
                        {{ $r->nama_rt }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ==================== INFORMASI ==================== --}}
    <section id="informasi" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">📢 Informasi & Pengumuman</h2>
                <p class="text-gray-600">Berita terbaru seputar kampung</p>
            </div>

            <form method="GET" action="{{ route('landing') }}#informasi" class="mb-10 flex justify-center">
                <div class="flex gap-2 w-full max-w-xl flex-wrap">
                    <input type="text" name="search_informasi"
                           placeholder="Cari informasi..."
                           value="{{ $searchInformasi }}"
                           class="flex-1 min-w-[200px] px-5 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-emerald-700 transition shadow-md">
                        Cari
                    </button>
                    @if ($searchInformasi)
                        <a href="{{ route('landing') }}#informasi" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-300 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            @if ($searchInformasi)
                <p class="mb-6 text-center text-gray-700">
                    <b>Hasil pencarian:</b> "{{ $searchInformasi }}"
                    <span class="text-gray-500">({{ $informasi->count() }} hasil)</span>
                </p>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($informasi as $info)
                    <article class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                        @if ($info->gambar)
                            <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->judul }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                                <span class="text-white text-5xl">📰</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <p class="text-sm text-emerald-600 font-semibold mb-2">
                                {{ $info->tanggal?->format('d M Y') }}
                            </p>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $info->judul }}</h3>
                            <p class="text-gray-600 line-clamp-3">{{ $info->isi }}</p>
                        </div>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-500 py-12">Tidak ada informasi.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ==================== KEGIATAN ==================== --}}
    <section id="kegiatan" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">🎉 Kegiatan Kampung</h2>
                <p class="text-gray-600">Agenda dan acara yang akan datang</p>
            </div>

            <form method="GET" action="{{ route('landing') }}#kegiatan" class="mb-10 flex justify-center">
                <div class="flex gap-2 w-full max-w-xl flex-wrap">
                    <input type="text" name="search_kegiatan"
                           placeholder="Cari kegiatan..."
                           value="{{ $searchKegiatan }}"
                           class="flex-1 min-w-[200px] px-5 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-emerald-700 transition shadow-md">
                        Cari
                    </button>
                    @if ($searchKegiatan)
                        <a href="{{ route('landing') }}#kegiatan" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-300 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            @if ($searchKegiatan)
                <p class="mb-6 text-center text-gray-700">
                    <b>Hasil pencarian:</b> "{{ $searchKegiatan }}"
                    <span class="text-gray-500">({{ $kegiatan->count() }} hasil)</span>
                </p>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($kegiatan as $k)
                    <article class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                        @if ($k->gambar)
                            <img src="{{ asset('storage/' . $k->gambar) }}" alt="{{ $k->nama_kegiatan }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-teal-400 to-emerald-500 flex items-center justify-center">
                                <span class="text-white text-5xl">🎊</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $k->nama_kegiatan }}</h3>
                            <div class="space-y-2 text-sm text-gray-600 mb-4">
                                <p>📅 {{ $k->tanggal?->format('d M Y') }}</p>
                                <p>🕐 {{ $k->waktu_mulai }} - {{ $k->waktu_selesai }}</p>
                                <p>📍 {{ $k->lokasi }}</p>
                            </div>
                            <p class="text-gray-700 line-clamp-3">{{ $k->deskripsi }}</p>
                        </div>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-500 py-12">Tidak ada kegiatan.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ==================== UMKM ==================== --}}
    <section id="umkm" class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">🛒 UMKM Kampung</h2>
                <p class="text-gray-600">Dukung produk lokal warga kami</p>
            </div>

            <form method="GET" action="{{ route('landing') }}#umkm" class="mb-10 flex justify-center">
                <div class="flex gap-2 w-full max-w-xl flex-wrap">
                    <input type="text" name="search_umkm"
                           placeholder="Cari UMKM..."
                           value="{{ $searchUmkm }}"
                           class="flex-1 min-w-[200px] px-5 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-emerald-500 focus:border-transparent outline-none">
                    <button type="submit" class="bg-emerald-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-emerald-700 transition shadow-md">
                        Cari
                    </button>
                    @if ($searchUmkm)
                        <a href="{{ route('landing') }}#umkm" class="bg-gray-200 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-300 transition">
                            Reset
                        </a>
                    @endif
                </div>
            </form>

            @if ($searchUmkm)
                <p class="mb-6 text-center text-gray-700">
                    <b>Hasil pencarian:</b> "{{ $searchUmkm }}"
                    <span class="text-gray-500">({{ $umkm->count() }} hasil)</span>
                </p>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($umkm as $u)
                    <article class="bg-gray-50 rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                        @if ($u->foto)
                            <img src="{{ asset('storage/' . $u->foto) }}" alt="{{ $u->nama_usaha }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center">
                                <span class="text-white text-5xl">🏪</span>
                            </div>
                        @endif
                        <div class="p-6">
                            <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full mb-3">
                                {{ $u->kategori->nama_kategori }}
                            </span>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $u->nama_usaha }}</h3>
                            <div class="space-y-2 text-sm text-gray-600 mb-4">
                                <p>📍 {{ $u->alamat }}</p>
                                <p>📱 {{ $u->whatsapp }}</p>
                            </div>
                            <p class="text-gray-700 mb-4 line-clamp-2">{{ $u->deskripsi }}</p>
                            <a href="https://wa.me/{{ $u->whatsapp }}" target="_blank"
                               class="inline-block bg-green-500 text-white px-5 py-2.5 rounded-full font-semibold hover:bg-green-600 transition text-sm shadow-md">
                                Hubungi via WhatsApp
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="col-span-full text-center text-gray-500 py-12">Tidak ada UMKM.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
    <footer class="bg-gray-900 text-gray-300 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>