<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
<<<<<<< Updated upstream
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
=======
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-serif { font-family: 'Instrument Serif', Georgia, serif; }

        /* Fluid typography */
        .text-fluid-xs   { font-size: clamp(0.7rem, 1.5vw, 0.75rem); }
        .text-fluid-sm   { font-size: clamp(0.8125rem, 1.8vw, 0.875rem); }
        .text-fluid-base { font-size: clamp(0.875rem, 2vw, 1rem); }
        .text-fluid-lg   { font-size: clamp(1rem, 2.4vw, 1.125rem); }
        .text-fluid-xl   { font-size: clamp(1.125rem, 3vw, 1.375rem); }
        .text-fluid-2xl  { font-size: clamp(1.375rem, 4vw, 1.75rem); }
        .text-fluid-3xl  { font-size: clamp(1.75rem, 5vw, 2.25rem); }
        .text-fluid-4xl  { font-size: clamp(2rem, 6vw, 2.75rem); }
        .text-fluid-5xl  { font-size: clamp(2.25rem, 7vw, 3.5rem); }
        .text-fluid-6xl  { font-size: clamp(2.5rem, 9vw, 4.5rem); }

        /* Custom breakpoint xs (420px+) */
        @media (min-width: 420px) {
            .xs\:block { display: block !important; }
            .xs\:hidden { display: none !important; }
        }

        /* Mobile menu overlay — full screen backdrop */
        #mobileOverlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: 40;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        #mobileOverlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        /* Mobile menu panel — solid card */
        #mobileMenu {
            position: fixed;
            top: 84px;
            left: 50%;
            transform: translateX(-50%) translateY(-12px);
            width: calc(100% - 1.5rem);
            max-width: 480px;
            z-index: 45;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #mobileMenu.active {
            opacity: 1;
            pointer-events: auto;
            transform: translateX(-50%) translateY(0);
        }

        #mobileMenu .menu-panel {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 24px;
            padding: 8px;
            box-shadow:
                0 20px 48px rgba(0, 0, 0, 0.12),
                0 4px 12px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .dark #mobileMenu .menu-panel {
            background: #1a1a1a;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow:
                0 20px 48px rgba(0, 0, 0, 0.6),
                0 4px 12px rgba(0, 0, 0, 0.4);
        }

        #mobileMenu .menu-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 500;
            color: #3d3d3d;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .dark #mobileMenu .menu-item {
            color: #c8c8c8;
        }

        #mobileMenu .menu-item:hover {
            background: #f5f5f2;
            color: #1a1a1a;
        }

        .dark #mobileMenu .menu-item:hover {
            background: rgba(255, 255, 255, 0.06);
            color: #efefec;
        }

        #mobileMenu .menu-item-primary {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px 16px;
            border-radius: 18px;
            font-size: 15px;
            font-weight: 600;
            background: #1a1a1a;
            color: #ffffff;
            transition: all 0.2s ease;
            text-decoration: none;
            margin-top: 4px;
        }

        .dark #mobileMenu .menu-item-primary {
            background: #8a9a7a;
            color: #1a1a1a;
        }

        #mobileMenu .menu-item-primary:hover {
            background: #2a2a2a;
            transform: scale(1.02);
        }

        .dark #mobileMenu .menu-item-primary:hover {
            background: #a8b89a;
        }

        #mobileMenu .menu-divider {
            height: 1px;
            background: rgba(0, 0, 0, 0.06);
            margin: 6px 8px;
        }

        .dark #mobileMenu .menu-divider {
            background: rgba(255, 255, 255, 0.06);
        }
    </style>

    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'light';
            if (theme === 'dark') document.documentElement.classList.add('dark');
        })();
    </script>
</head>
<body class="text-ink-900 dark:text-ink-100 antialiased">

    {{-- ==================== NAVBAR ==================== --}}
    <nav id="navbar"
         class="fixed top-3 left-1/2 -translate-x-1/2 z-50
                w-[calc(100%-1.5rem)] max-w-6xl
                transition-all duration-300">

        {{-- Bar utama (selalu tampil) --}}
        <div class="rounded-full nav-glass
                    px-3.5 sm:px-5 py-2 sm:py-2.5
                    flex items-center justify-between gap-2">

            {{-- Brand --}}
            <a href="#hero" class="flex items-center gap-2 shrink-0 min-w-0">
                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-sage-800 dark:bg-sage-500
                            flex items-center justify-center
                            text-sage-50 text-[10px] sm:text-xs font-bold tracking-tight shrink-0">
                    KT
                </div>
                <div class="hidden xs:block leading-tight min-w-0">
                    <div class="text-[13px] sm:text-sm font-semibold truncate max-w-[110px] sm:max-w-[200px]">
                        {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}
                    </div>
                    <div class="hidden sm:block text-[9px] text-ink-500 dark:text-ink-400 uppercase tracking-widest">
                        Kampung Digital
                    </div>
                </div>
            </a>

            {{-- Desktop Menu (lg ke atas) --}}
            <div class="hidden lg:flex items-center gap-0.5">
                <a href="#hero" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">Beranda</a>
                <a href="#tentang" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">Tentang</a>
                <a href="#layanan" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">Layanan</a>
                <a href="#informasi" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">Informasi</a>
                <a href="#kegiatan" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">Kegiatan</a>
                <a href="#umkm" class="px-3 py-2 rounded-full text-sm font-medium text-ink-600 dark:text-ink-300 hover:text-ink-900 dark:hover:text-ink-50 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">UMKM</a>

                <div class="w-px h-5 bg-ink-200 dark:bg-white/10 mx-1.5"></div>

                <button onclick="toggleTheme()"
                        aria-label="Toggle tema"
                        class="w-9 h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                    </svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>

                <a href="{{ route('login') }}"
                   class="ml-1 px-4 py-2 rounded-full text-sm font-medium bg-ink-900 dark:bg-sage-500 text-white dark:text-ink-900 hover:bg-ink-800 dark:hover:bg-sage-400 transition-colors">
                    Masuk
                </a>
            </div>

            {{-- Mobile/Tablet Buttons --}}
            <div class="lg:hidden flex items-center gap-1 shrink-0">
                <button onclick="toggleTheme()"
                        aria-label="Toggle tema"
                        class="w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                    </svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>

                <button onclick="toggleMobileMenu()"
                        id="menuButton"
                        aria-label="Menu"
                        class="w-8 h-8 sm:w-9 sm:h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-white/5 transition-colors">
                    {{-- Icon hamburger --}}
                    <svg id="iconHamburger" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    {{-- Icon X --}}
                    <svg id="iconClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- ==================== MOBILE MENU PANEL ==================== --}}
    <div id="mobileOverlay" onclick="closeMobileMenu()"></div>

    <div id="mobileMenu">
        <div class="menu-panel">
            <a href="#hero" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>
            <a href="#tentang" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 16v-4M12 8h.01"/>
                </svg>
                Tentang
            </a>
            <a href="#layanan" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Layanan
            </a>
            <a href="#informasi" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                Informasi
            </a>
            <a href="#kegiatan" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <rect x="3" y="4" width="18" height="18" rx="2"/><path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                Kegiatan
            </a>
            <a href="#umkm" class="menu-item" onclick="closeMobileMenu()">
                <svg class="w-4 h-4 mr-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0H9"/>
                </svg>
                UMKM
            </a>

            <div class="menu-divider"></div>

            <a href="{{ route('login') }}" class="menu-item-primary" onclick="closeMobileMenu()">
                Masuk
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>

    {{-- ==================== HERO ==================== --}}
    <header id="hero" class="relative min-h-[100svh] flex items-end pt-24 sm:pt-32 pb-16 overflow-hidden">

        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920&q=80"
                 alt="Kampung Trimulyo"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-ink-900/30 via-ink-900/60 to-ink-900/95"></div>
        </div>

        <div class="relative z-10 container-fluid w-full">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 mb-5 sm:mb-8 slide-in-left">
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sage-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-sage-400"></span>
                    </span>
                    <span class="text-fluid-xs font-medium text-white/80 uppercase tracking-[0.2em]">Kampung Digital · {{ $rw->nama_rw ?? 'RW 02' }}</span>
                </div>

                <h1 class="font-serif text-fluid-6xl leading-[0.95] tracking-tight mb-5 sm:mb-6 text-white slide-in-left"
                    style="animation-delay: 0.1s;">
                    {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}
                </h1>

                <p class="text-fluid-lg text-white/80 max-w-2xl leading-relaxed mb-8 sm:mb-10 slide-in-left"
                   style="animation-delay: 0.2s;">
                    Portal informasi dan kegiatan warga. Satu tempat untuk pengumuman, agenda, dan UMKM kampung.
                </p>

                <div class="flex flex-wrap gap-3 mb-12 sm:mb-16 slide-in-left" style="animation-delay: 0.3s;">
                    <a href="#tentang"
                       class="inline-flex items-center gap-2 px-5 sm:px-6 py-3 rounded-full bg-white text-ink-900 text-fluid-sm font-semibold hover:bg-ink-100 transition-colors">
                        Kenali Kami
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#umkm"
                       class="inline-flex items-center px-5 sm:px-6 py-3 rounded-full text-fluid-sm font-medium text-white border border-white/25 hover:bg-white/10 transition-colors">
                        Lihat UMKM
                    </a>
                </div>
            </div>

            {{-- Statistik --}}
            <div class="pt-6 sm:pt-8 border-t border-white/15 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                <div>
                    <div class="font-serif text-fluid-4xl text-white mb-1"><span class="counter" data-target="{{ $totalRt }}">0</span></div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Wilayah RT</div>
                </div>
                <div>
                    <div class="font-serif text-fluid-4xl text-white mb-1"><span class="counter" data-target="{{ $totalWarga }}">0</span></div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Warga Terdaftar</div>
                </div>
                <div>
                    <div class="font-serif text-fluid-4xl text-white mb-1"><span class="counter" data-target="{{ $totalInfo }}">0</span></div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Informasi</div>
                </div>
                <div>
                    <div class="font-serif text-fluid-4xl text-white mb-1"><span class="counter" data-target="{{ $totalUmkm }}">0</span></div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">UMKM</div>
                </div>
            </div>
        </div>

        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 bounce-soft">
            <svg class="w-5 h-5 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </header>

    {{-- ==================== TENTANG ==================== --}}
    <section id="tentang" class="py-16 sm:py-24 lg:py-32 scroll-mt-24">
        <div class="container-fluid">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16">
                <div class="lg:col-span-5">
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">01 — Tentang</div>
                    <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight mb-6">
                        Selamat datang di<br>
                        <span class="text-sage-700 dark:text-sage-400">{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</span>
                    </h2>
                </div>

                <div class="lg:col-span-7">
                    <p class="text-fluid-lg text-ink-700 dark:text-ink-300 leading-relaxed mb-6">
                        Sebuah kampung yang tumbuh bersama, dengan semangat gotong royong dan kebersamaan.
                    </p>
                    <p class="text-fluid-base text-ink-600 dark:text-ink-400 leading-relaxed mb-8">
                        Kami membangun sistem informasi ini untuk mempermudah komunikasi, mempererat silaturahmi, dan meningkatkan kualitas hidup warga.
                    </p>

                    <div class="flex flex-wrap gap-x-6 gap-y-3 pt-6 border-t border-ink-200 dark:border-ink-800">
                        <div class="flex items-center gap-2 text-fluid-sm text-ink-600 dark:text-ink-400">
                            <div class="w-1.5 h-1.5 rounded-full bg-sage-500"></div>
                            Guyub
                        </div>
                        <div class="flex items-center gap-2 text-fluid-sm text-ink-600 dark:text-ink-400">
                            <div class="w-1.5 h-1.5 rounded-full bg-sage-500"></div>
                            Gotong Royong
                        </div>
                        <div class="flex items-center gap-2 text-fluid-sm text-ink-600 dark:text-ink-400">
                            <div class="w-1.5 h-1.5 rounded-full bg-sage-500"></div>
                            Berkelanjutan
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-12 mt-16 sm:mt-20 pt-16 sm:pt-20 border-t border-ink-200 dark:border-ink-800">
                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <svg class="w-5 h-5 text-sage-700 dark:text-sage-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                        <h3 class="text-fluid-lg font-semibold">Visi</h3>
                    </div>
                    <p class="text-fluid-base text-ink-600 dark:text-ink-400 leading-relaxed">
                        Menjadi kampung yang maju, mandiri, dan harmonis melalui semangat kebersamaan seluruh warga.
                    </p>
                </div>

                <div>
                    <div class="flex items-center gap-3 mb-5">
                        <svg class="w-5 h-5 text-sage-700 dark:text-sage-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        <h3 class="text-fluid-lg font-semibold">Misi</h3>
                    </div>
                    <ul class="space-y-3 text-fluid-base text-ink-600 dark:text-ink-400 leading-relaxed">
                        <li class="flex gap-3">
                            <span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">01</span>
                            Menyediakan informasi yang mudah diakses warga
                        </li>
                        <li class="flex gap-3">
                            <span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">02</span>
                            Mendukung usaha dan kegiatan warga
                        </li>
                        <li class="flex gap-3">
                            <span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">03</span>
                            Meningkatkan pelayanan kampung
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== LAYANAN ==================== --}}
    <section id="layanan" class="py-16 sm:py-24 lg:py-32 bg-ink-50 dark:bg-[#131313] scroll-mt-24">
        <div class="container-fluid">

            <div class="mb-12 sm:mb-16">
                <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">02 — Layanan</div>
                <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight max-w-3xl">
                    Apa yang kami sediakan
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-10">
                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Informasi Warga</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">
                        Pengumuman, agenda, dan berita terbaru seputar kampung.
                    </p>
                </div>

                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Kegiatan Kampung</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">
                        Jadwal dan dokumentasi berbagai kegiatan warga.
                    </p>
                </div>

                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0H9"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">UMKM Warga</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">
                        Dukung dan temukan usaha dari warga sekitar.
                    </p>
                </div>

                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Pengaduan</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">
                        Sampaikan keluhan atau saran untuk kampung yang lebih baik.
                    </p>
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </section>

    {{-- ==================== INFORMASI ==================== --}}
<<<<<<< Updated upstream
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
=======
    <section id="informasi" class="py-16 sm:py-24 lg:py-32 scroll-mt-24">
        <div class="container-fluid">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-10 sm:mb-14">
                <div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">03 — Informasi</div>
                    <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight">Informasi terbaru</h2>
                </div>

                <form method="GET" action="{{ route('landing') }}#informasi" class="flex-shrink-0">
                    <div class="relative">
                        <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-ink-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                        <input type="text" name="search_informasi" placeholder="Cari informasi..." value="{{ $searchInformasi }}"
                               class="pl-10 pr-4 py-2.5 w-full sm:w-64 rounded-full bg-white dark:bg-ink-800 border border-ink-200 dark:border-ink-700 text-fluid-sm focus:outline-none focus:border-sage-500 transition-colors">
                    </div>
                </form>
            </div>

            @if ($informasi->count() > 0)
                <div class="relative">
                    <div class="flex items-center justify-end gap-1.5 mb-4">
                        <button onclick="scrollH('scrollInformasi', -1)"
                                aria-label="Sebelumnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button onclick="scrollH('scrollInformasi', 1)"
                                aria-label="Berikutnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    <div class="h-scroll" id="scrollInformasi">
                        @foreach ($informasi as $info)
                            <article
                                data-judul="{{ $info->judul }}"
                                data-tanggal="{{ $info->tanggal?->format('d M Y') }}"
                                data-isi="{{ $info->isi }}"
                                data-gambar="{{ $info->gambar ? asset('storage/' . $info->gambar) : '' }}"
                                data-meta=""
                                class="w-[80vw] xs:w-[75vw] sm:w-[360px] md:w-[380px] lg:w-[400px] card-editorial rounded-2xl overflow-hidden cursor-pointer card-clickable">
                                @if ($info->gambar)
                                    <div class="aspect-[4/3] overflow-hidden bg-ink-100 dark:bg-ink-800">
                                        <img src="{{ asset('storage/' . $info->gambar) }}"
                                             class="w-full h-full object-cover hover:scale-[1.03] transition-transform duration-500"
                                             draggable="false" alt="{{ $info->judul }}" loading="lazy">
                                    </div>
                                @else
                                    <div class="aspect-[4/3] bg-gradient-to-br from-sage-100 to-sage-200 dark:from-sage-900/40 dark:to-sage-800/20 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-sage-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-5 sm:p-6">
                                    <div class="text-fluid-xs uppercase tracking-[0.15em] text-ink-500 dark:text-ink-400 mb-3">
                                        {{ $info->tanggal?->format('d M Y') }}
                                    </div>
                                    <h3 class="text-fluid-lg font-semibold leading-snug mb-2 line-clamp-2">{{ $info->judul }}</h3>
                                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 line-clamp-3 leading-relaxed">{{ $info->isi }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-20 border border-dashed border-ink-200 dark:border-ink-800 rounded-2xl">
                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400">Belum ada informasi.</p>
                </div>
            @endif
        </div>
    </section>

    <div class="container-fluid"><div class="divider"></div></div>

    {{-- ==================== KEGIATAN ==================== --}}
    <section id="kegiatan" class="py-16 sm:py-24 lg:py-32 scroll-mt-24">
        <div class="container-fluid">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-10 sm:mb-14">
                <div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">04 — Kegiatan</div>
                    <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight">Agenda kampung</h2>
                </div>

                <form method="GET" action="{{ route('landing') }}#kegiatan" class="flex-shrink-0">
                    <div class="relative">
                        <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-ink-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                        <input type="text" name="search_kegiatan" placeholder="Cari kegiatan..." value="{{ $searchKegiatan }}"
                               class="pl-10 pr-4 py-2.5 w-full sm:w-64 rounded-full bg-white dark:bg-ink-800 border border-ink-200 dark:border-ink-700 text-fluid-sm focus:outline-none focus:border-sage-500 transition-colors">
                    </div>
                </form>
            </div>

            @if ($kegiatan->count() > 0)
                <div class="relative">
                    <div class="flex items-center justify-end gap-1.5 mb-4">
                        <button onclick="scrollH('scrollKegiatan', -1)"
                                aria-label="Sebelumnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button onclick="scrollH('scrollKegiatan', 1)"
                                aria-label="Berikutnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    <div class="h-scroll" id="scrollKegiatan">
                        @foreach ($kegiatan as $k)
                            <article
                                data-judul="{{ $k->nama_kegiatan }}"
                                data-tanggal="{{ $k->tanggal?->format('d M Y') }} · {{ $k->waktu_mulai }} - {{ $k->waktu_selesai }}"
                                data-isi="{{ $k->deskripsi }}"
                                data-gambar="{{ $k->gambar ? asset('storage/' . $k->gambar) : '' }}"
                                data-meta="{{ $k->lokasi }}"
                                class="w-[80vw] xs:w-[75vw] sm:w-[360px] md:w-[380px] lg:w-[400px] card-editorial rounded-2xl overflow-hidden cursor-pointer card-clickable">
                                @if ($k->gambar)
                                    <div class="aspect-[4/3] overflow-hidden bg-ink-100 dark:bg-ink-800">
                                        <img src="{{ asset('storage/' . $k->gambar) }}"
                                             class="w-full h-full object-cover hover:scale-[1.03] transition-transform duration-500"
                                             draggable="false" alt="{{ $k->nama_kegiatan }}" loading="lazy">
                                    </div>
                                @else
                                    <div class="aspect-[4/3] bg-gradient-to-br from-sage-100 to-sage-200 dark:from-sage-900/40 dark:to-sage-800/20 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-sage-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                                            <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-5 sm:p-6">
                                    <div class="flex items-center gap-2 text-fluid-xs uppercase tracking-[0.15em] text-ink-500 dark:text-ink-400 mb-3">
                                        <span>{{ $k->tanggal?->format('d M Y') }}</span>
                                        <span class="w-1 h-1 rounded-full bg-ink-300 dark:bg-ink-600"></span>
                                        <span>{{ $k->waktu_mulai }}</span>
                                    </div>
                                    <h3 class="text-fluid-lg font-semibold leading-snug mb-2 line-clamp-2">{{ $k->nama_kegiatan }}</h3>
                                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400 mb-3">{{ $k->lokasi }}</p>
                                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 line-clamp-2 leading-relaxed">{{ $k->deskripsi }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-20 border border-dashed border-ink-200 dark:border-ink-800 rounded-2xl">
                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400">Belum ada kegiatan.</p>
                </div>
            @endif
        </div>
    </section>

    <div class="container-fluid"><div class="divider"></div></div>

    {{-- ==================== UMKM ==================== --}}
    <section id="umkm" class="py-16 sm:py-24 lg:py-32 scroll-mt-24">
        <div class="container-fluid">

            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-10 sm:mb-14">
                <div>
                    <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">05 — UMKM</div>
                    <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight">Usaha warga</h2>
                </div>

                <form method="GET" action="{{ route('landing') }}#umkm" class="flex-shrink-0">
                    <div class="relative">
                        <svg class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-ink-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                        </svg>
                        <input type="text" name="search_umkm" placeholder="Cari UMKM..." value="{{ $searchUmkm }}"
                               class="pl-10 pr-4 py-2.5 w-full sm:w-64 rounded-full bg-white dark:bg-ink-800 border border-ink-200 dark:border-ink-700 text-fluid-sm focus:outline-none focus:border-sage-500 transition-colors">
                    </div>
                </form>
            </div>

            @if ($umkm->count() > 0)
                <div class="relative">
                    <div class="flex items-center justify-end gap-1.5 mb-4">
                        <button onclick="scrollH('scrollUmkm', -1)"
                                aria-label="Sebelumnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button onclick="scrollH('scrollUmkm', 1)"
                                aria-label="Berikutnya"
                                class="w-9 h-9 rounded-full flex items-center justify-center border border-ink-200 dark:border-ink-700 text-ink-600 dark:text-ink-300 hover:bg-ink-100 dark:hover:bg-ink-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    <div class="h-scroll" id="scrollUmkm">
                        @foreach ($umkm as $u)
                            <article
                                data-judul="{{ $u->nama_usaha }}"
                                data-tanggal="{{ $u->kategori->nama_kategori ?? '-' }}"
                                data-isi="{{ $u->deskripsi }}"
                                data-gambar="{{ $u->foto ? asset('storage/' . $u->foto) : '' }}"
                                data-meta="{{ $u->alamat }} · {{ $u->whatsapp }}"
                                class="w-[70vw] xs:w-[65vw] sm:w-[300px] md:w-[320px] lg:w-[340px] card-editorial rounded-2xl overflow-hidden cursor-pointer card-clickable">
                                @if ($u->foto)
                                    <div class="aspect-square overflow-hidden bg-ink-100 dark:bg-ink-800">
                                        <img src="{{ asset('storage/' . $u->foto) }}"
                                             class="w-full h-full object-cover hover:scale-[1.03] transition-transform duration-500"
                                             draggable="false" alt="{{ $u->nama_usaha }}" loading="lazy">
                                    </div>
                                @else
                                    <div class="aspect-square bg-gradient-to-br from-sage-100 to-sage-200 dark:from-sage-900/40 dark:to-sage-800/20 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-sage-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0H9"/>
                                        </svg>
                                    </div>
                                @endif

                                <div class="p-5">
                                    <div class="text-fluid-xs uppercase tracking-[0.15em] text-sage-700 dark:text-sage-400 mb-2 font-medium">
                                        {{ $u->kategori->nama_kategori ?? '-' }}
                                    </div>
                                    <h3 class="text-fluid-base font-semibold leading-snug mb-2 line-clamp-2">{{ $u->nama_usaha }}</h3>
                                    <p class="text-fluid-xs text-ink-500 dark:text-ink-400 leading-relaxed line-clamp-2">{{ $u->alamat }}</p>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="text-center py-20 border border-dashed border-ink-200 dark:border-ink-800 rounded-2xl">
                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400">Belum ada UMKM.</p>
                </div>
            @endif
>>>>>>> Stashed changes
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
<<<<<<< Updated upstream
    <footer class="bg-gray-900 text-gray-300 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}. All rights reserved.
            </p>
=======
    <footer class="border-t border-ink-200 dark:border-ink-800 mt-16">
        <div class="container-fluid py-12 sm:py-16">

            <div class="grid grid-cols-1 md:grid-cols-12 gap-10 mb-10">
                <div class="md:col-span-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-full bg-sage-800 dark:bg-sage-500 flex items-center justify-center text-sage-50 text-xs font-bold">KT</div>
                        <div>
                            <div class="text-fluid-sm font-semibold">{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</div>
                            <div class="text-[10px] text-ink-500 dark:text-ink-400 uppercase tracking-widest">Kampung Digital</div>
                        </div>
                    </div>
                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400 max-w-sm leading-relaxed">
                        Sistem informasi kampung digital untuk warga {{ $rw->nama_rw ?? 'RW 02' }}.
                    </p>
                </div>

                <div class="md:col-span-3">
                    <h4 class="text-fluid-xs font-semibold uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">Navigasi</h4>
                    <ul class="space-y-2.5 text-fluid-sm">
                        <li><a href="#tentang" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Tentang</a></li>
                        <li><a href="#layanan" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Layanan</a></li>
                        <li><a href="#informasi" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Informasi</a></li>
                        <li><a href="#kegiatan" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Kegiatan</a></li>
                    </ul>
                </div>

                <div class="md:col-span-4">
                    <h4 class="text-fluid-xs font-semibold uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">Lainnya</h4>
                    <ul class="space-y-2.5 text-fluid-sm">
                        <li><a href="#umkm" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">UMKM</a></li>
                        <li><a href="{{ route('login') }}" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Masuk</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-6 border-t border-ink-200 dark:border-ink-800 flex flex-col sm:flex-row justify-between gap-3 text-fluid-xs text-ink-500 dark:text-ink-400">
                <div>&copy; {{ date('Y') }} {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</div>
                <div>Sistem Informasi Kampung Digital</div>
            </div>
>>>>>>> Stashed changes
        </div>
    </footer>

    {{-- ==================== BACK TO TOP ==================== --}}
    <button id="backToTop"
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            aria-label="Kembali ke atas"
            class="fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-40
                   w-11 h-11 sm:w-12 sm:h-12 rounded-full
                   bg-sage-800 dark:bg-sage-500 text-white
                   flex items-center justify-center
                   opacity-0 pointer-events-none
                   transition-all duration-300
                   hover:scale-105">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    {{-- ==================== MODAL ==================== --}}
    <div id="modal" class="hidden fixed inset-0 z-[100] items-center justify-center p-3 sm:p-6"
         style="background: rgba(0,0,0,0.75); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">

        <div class="modal-in card-editorial rounded-2xl w-full max-w-3xl max-h-[92vh] overflow-y-auto relative">
            <button onclick="closeModal()"
                    aria-label="Tutup"
                    class="absolute top-3 right-3 sm:top-4 sm:right-4 z-10 w-10 h-10 rounded-full
                           bg-white/95 dark:bg-ink-800/95 backdrop-blur-sm
                           flex items-center justify-center
                           text-ink-900 dark:text-ink-100
                           hover:bg-white dark:hover:bg-ink-700
                           transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div id="modalImage" class="hidden">
                <img id="modalImg" src="" alt="" class="w-full max-h-[55vh] object-contain bg-ink-100 dark:bg-ink-900">
            </div>

            <div class="p-5 sm:p-8">
                <div class="text-fluid-xs uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-3" id="modalTanggal"></div>
                <h2 class="font-serif text-fluid-3xl leading-tight tracking-tight mb-4" id="modalJudul"></h2>
                <div class="divider mb-5"></div>
                <p class="text-fluid-base text-ink-600 dark:text-ink-300 leading-relaxed whitespace-pre-line" id="modalIsi"></p>
                <div id="modalMeta" class="mt-6 pt-5 border-t border-ink-200 dark:border-ink-800 text-fluid-sm text-ink-500 dark:text-ink-400 hidden"></div>
            </div>
        </div>
    </div>

    {{-- ==================== SCRIPT ==================== --}}
    <script>
        function toggleTheme() {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        }

        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 20) {
                navbar.classList.add('nav-glass-scrolled');
            } else {
                navbar.classList.remove('nav-glass-scrolled');
            }

            if (window.pageYOffset > 600) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
            }
        }, { passive: true });

        // Mobile menu
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileOverlay = document.getElementById('mobileOverlay');
        const iconHamburger = document.getElementById('iconHamburger');
        const iconClose = document.getElementById('iconClose');

        function toggleMobileMenu() {
            const isOpen = mobileMenu.classList.contains('active');

            if (isOpen) {
                closeMobileMenu();
            } else {
                mobileMenu.classList.add('active');
                mobileOverlay.classList.add('active');
                iconHamburger.classList.add('hidden');
                iconClose.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileOverlay.classList.remove('active');
            iconHamburger.classList.remove('hidden');
            iconClose.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Tutup menu saat tekan ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMobileMenu();
        });

        function scrollH(id, dir) {
            const el = document.getElementById(id);
            if (!el) return;
            const card = el.querySelector('article');
            const step = card ? card.offsetWidth + 24 : 400;
            el.scrollBy({ left: dir * step, behavior: 'smooth' });
        }

        // Drag scroll
        document.querySelectorAll('.h-scroll').forEach(slider => {
            let isDown = false, startX = 0, scrollLeftStart = 0, moved = false;

            slider.addEventListener('mousedown', (e) => {
                isDown = true;
                moved = false;
                startX = e.pageX - slider.offsetLeft;
                scrollLeftStart = slider.scrollLeft;
                slider.style.cursor = 'grabbing';
            });

            ['mouseleave', 'mouseup'].forEach(evt => {
                slider.addEventListener(evt, () => {
                    isDown = false;
                    slider.style.cursor = 'grab';
                    setTimeout(() => {
                        slider.querySelectorAll('.card-clickable').forEach(c => c.dataset.dragged = 'false');
                    }, 50);
                });
            });

            slider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 1.5;
                if (Math.abs(walk) > 5) {
                    moved = true;
                    slider.querySelectorAll('.card-clickable').forEach(c => c.dataset.dragged = 'true');
                }
                e.preventDefault();
                slider.scrollLeft = scrollLeftStart - walk;
            });
        });

        document.querySelectorAll('.card-clickable').forEach(card => {
            card.addEventListener('click', () => {
                if (card.dataset.dragged === 'true') return;
                openModal({
                    judul: card.dataset.judul || '',
                    tanggal: card.dataset.tanggal || '',
                    isi: card.dataset.isi || '',
                    gambar: card.dataset.gambar || '',
                    meta: card.dataset.meta || '',
                });
            });
        });

        function openModal(data) {
            const modal = document.getElementById('modal');
            const img = document.getElementById('modalImage');
            const imgEl = document.getElementById('modalImg');

            document.getElementById('modalJudul').textContent = data.judul;
            document.getElementById('modalTanggal').textContent = data.tanggal;
            document.getElementById('modalIsi').textContent = data.isi;

            const meta = document.getElementById('modalMeta');
            if (data.meta && data.meta.trim() !== '' && data.meta !== 'null') {
                meta.textContent = data.meta;
                meta.classList.remove('hidden');
            } else {
                meta.classList.add('hidden');
            }

            if (data.gambar && data.gambar.trim() !== '') {
                imgEl.src = data.gambar;
                img.classList.remove('hidden');
            } else {
                img.classList.add('hidden');
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.getElementById('modal').addEventListener('click', (e) => {
            if (e.target.id === 'modal') closeModal();
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
        });

        // Fade in
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('fade-in-up');
            });
        }, { threshold: 0.08 });
        document.querySelectorAll('section, header > div').forEach(el => io.observe(el));

        // Counter
        const counters = document.querySelectorAll('.counter');
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target) || 0;
                    let current = 0;
                    const step = Math.max(1, Math.ceil(target / 40));

                    const update = () => {
                        current += step;
                        if (current >= target) {
                            el.textContent = target;
                        } else {
                            el.textContent = current;
                            requestAnimationFrame(update);
                        }
                    };
                    update();
                    counterObserver.unobserve(el);
                }
            });
        }, { threshold: 0.5 });
        counters.forEach(c => counterObserver.observe(c));
    </script>

</body>
</html>