<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>{{ $rw->nama_rw ?? 'Kampung Trimulyo' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-serif { font-family: 'Instrument Serif', Georgia, serif; }

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

        @media (min-width: 420px) {
            .xs\:block { display: block !important; }
            .xs\:hidden { display: none !important; }
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        /* ==================== NAVBAR GLASSMORPHISM ==================== */
        .glass-navbar {
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            border: 1.5px solid rgba(255, 255, 255, 0.5);
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.08),
                0 2px 8px rgba(0, 0, 0, 0.04),
                inset 0 1px 0 rgba(255, 255, 255, 0.8),
                inset 0 -1px 0 rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .dark .glass-navbar {
            background: rgba(30, 32, 34, 0.4);
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);
            border: 1.5px solid rgba(255, 255, 255, 0.18);
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 8px rgba(0, 0, 0, 0.2),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                inset 0 -1px 0 rgba(255, 255, 255, 0.05);
        }

        /* Saat scroll — navbar lebih solid supaya text terbaca */
        .glass-navbar.scrolled {
            background: rgba(255, 255, 255, 0.85);
            border: 1.5px solid rgba(255, 255, 255, 0.7);
            box-shadow:
                0 12px 40px rgba(0, 0, 0, 0.12),
                0 4px 12px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
        }

        .dark .glass-navbar.scrolled {
            background: rgba(30, 32, 34, 0.65);
            border: 1.5px solid rgba(255, 255, 255, 0.22);
            box-shadow:
                0 12px 40px rgba(0, 0, 0, 0.5),
                0 4px 12px rgba(0, 0, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.18);
        }

        /* ==================== CARD CARD-EDITORIAL (untuk section) ==================== */
        .card-clean {
            background: #ffffff;
            box-shadow:
                0 1px 3px rgba(90, 106, 74, 0.04),
                0 4px 24px rgba(90, 106, 74, 0.06);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(90, 106, 74, 0.04);
        }

        .dark .card-clean {
            background: #1e2022;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.03);
        }

        .card-clean:hover {
            box-shadow:
                0 2px 6px rgba(90, 106, 74, 0.06),
                0 20px 40px rgba(90, 106, 74, 0.12);
            transform: translateY(-4px);
            border-color: rgba(138, 154, 122, 0.15);
        }

        .dark .card-clean:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            border-color: rgba(255, 255, 255, 0.06);
        }

        /* ==================== H-SCROLL ==================== */
        .h-scroll {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            padding-bottom: 0.5rem;
            cursor: grab;
        }
        .h-scroll::-webkit-scrollbar { display: none; }
        .h-scroll:active { cursor: grabbing; }
        .h-scroll > * { scroll-snap-align: start; flex-shrink: 0; }

        /* ==================== DIVIDER ==================== */
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(0, 0, 0, 0.06), transparent);
        }
        .dark .divider {
            background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.06), transparent);
        }

        /* ==================== ANIMATIONS ==================== */
        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-up {
            animation: slideUpFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .delay-100 { animation-delay: 0.1s; opacity: 0; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; }
        .delay-400 { animation-delay: 0.4s; opacity: 0; }

        /* ==================== THEME TOGGLE ROTATE ==================== */
        @keyframes rotateIcon {
            from { transform: rotate(0deg) scale(1); }
            50% { transform: rotate(180deg) scale(1.15); }
            to { transform: rotate(360deg) scale(1); }
        }

        .theme-toggle-rotate {
            animation: rotateIcon 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ==================== LINE CLAMP ==================== */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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

    {{-- ==================== NAVBAR GLASSMORPHISM ==================== --}}
    <nav id="navbar"
            class="fixed top-3 left-1/2 -translate-x-1/2 z-50
                w-[calc(100%-1.5rem)] max-w-5xl
                rounded-3xl
                glass-navbar">

        <div class="px-3 sm:px-4 py-2 sm:py-2.5 flex items-center justify-between gap-2">

            {{-- Brand --}}
            <a href="#hero" class="flex items-center shrink-0 min-w-0">
                <img src="{{ asset('storage/logo/trimulyo.png') }}"
                        alt="Logo {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}"
                        class="h-9 sm:h-10 w-auto max-w-[120px] sm:max-w-[160px] object-contain"
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-0.5">
                <a href="#hero" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">Beranda</a>
                <a href="#tentang" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">Tentang</a>
                <a href="#layanan" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">Layanan</a>
                @if ($isLoggedIn)
                    <a href="#informasi" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">Informasi</a>
                    <a href="#kegiatan" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">Kegiatan</a>
                @endif
                <a href="#umkm" class="px-3 py-2 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:text-ink-900 dark:hover:text-white hover:bg-white/50 dark:hover:bg-white/10 transition-colors">UMKM</a>

                <div class="w-px h-5 bg-ink-300/50 dark:bg-white/15 mx-1"></div>

                <button onclick="toggleTheme(this)"
                        aria-label="Toggle tema"
                        class="theme-toggle-btn w-9 h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-white/50 dark:hover:bg-white/10 transition-colors">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                    </svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>

                @if ($isLoggedIn)
                    <a href="{{ url('/' . Auth::user()->role . '/dashboard') }}"
                        class="ml-1 px-4 py-2 rounded-full text-sm font-medium bg-ink-900 dark:bg-sage-500 text-white dark:text-ink-900 hover:bg-ink-800 dark:hover:bg-sage-400 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="ml-1 px-4 py-2 rounded-full text-sm font-medium bg-ink-900 dark:bg-sage-500 text-white dark:text-ink-900 hover:bg-ink-800 dark:hover:bg-sage-400 transition-colors">
                        Masuk
                    </a>
                @endif
            </div>

            {{-- Mobile Buttons --}}
            <div class="lg:hidden flex items-center gap-0.5">
                <button onclick="toggleTheme(this)"
                        aria-label="Toggle tema"
                        class="theme-toggle-btn w-9 h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-white/50 dark:hover:bg-white/10 transition-colors">
                    <svg class="w-4 h-4 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                    </svg>
                    <svg class="w-4 h-4 block dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>

                <button onclick="toggleMobileMenu()"
                        aria-label="Menu"
                        class="w-9 h-9 rounded-full flex items-center justify-center text-ink-600 dark:text-ink-300 hover:bg-white/50 dark:hover:bg-white/10 transition-colors">
                    <svg id="iconHamburger" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="iconClose" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden lg:hidden border-t border-white/30 dark:border-white/10 px-3 py-2">
            <a href="#hero" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">Beranda</a>
            <a href="#tentang" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">Tentang</a>
            <a href="#layanan" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">Layanan</a>
            @if ($isLoggedIn)
                <a href="#informasi" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">Informasi</a>
                <a href="#kegiatan" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">Kegiatan</a>
            @endif
            <a href="#umkm" class="block px-4 py-3 rounded-xl text-sm font-medium text-ink-700 dark:text-ink-200 hover:bg-white/50 dark:hover:bg-white/10 transition-colors" onclick="closeMobileMenu()">UMKM</a>

            <div class="h-px bg-white/30 dark:bg-white/10 my-2 mx-4"></div>

            @if ($isLoggedIn)
                <a href="{{ url('/' . Auth::user()->role . '/dashboard') }}" class="block px-4 py-3 rounded-xl text-sm font-semibold text-center bg-ink-900 dark:bg-sage-500 text-white dark:text-ink-900" onclick="closeMobileMenu()">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-3 rounded-xl text-sm font-semibold text-center bg-ink-900 dark:bg-sage-500 text-white dark:text-ink-900" onclick="closeMobileMenu()">
                    Masuk
                </a>
            @endif
        </div>
    </nav>

    {{-- ==================== HERO ==================== --}}
    <header id="hero" class="relative min-h-[100svh] flex items-end pt-24 sm:pt-32 pb-16 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('storage/hero/back.jpg') }}"
                    alt="Kampung Trimulyo"
                    class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-ink-900/30 via-ink-900/60 to-ink-900/95"></div>
        </div>

        <div class="relative z-10 container-fluid w-full">
            <div class="max-w-4xl">
                <div class="inline-flex items-center gap-2 mb-5 sm:mb-8 animate-slide-up">
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sage-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-sage-400"></span>
                    </span>
                    <span class="text-fluid-xs font-medium text-white/80 uppercase tracking-[0.2em]">Kampung Digital · {{ $rw->nama_rw ?? 'RW 02' }}</span>
                </div>

                <h1 class="font-serif text-fluid-6xl leading-[0.95] tracking-tight mb-5 sm:mb-6 text-white animate-slide-up delay-100">
                    {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}
                </h1>

                <p class="text-fluid-lg text-white/80 max-w-2xl leading-relaxed mb-8 sm:mb-10 animate-slide-up delay-200">
                    Portal informasi dan kegiatan warga. Satu tempat untuk pengumuman, agenda, dan UMKM kampung.
                </p>

                <div class="flex flex-wrap gap-3 mb-12 sm:mb-16 animate-slide-up delay-300">
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

            @if ($isLoggedIn)
                <div class="pt-6 sm:pt-8 border-t border-white/15 grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 animate-slide-up delay-400">
                    <div>
                        <div class="font-serif text-fluid-4xl text-white mb-1">{{ $totalRt }}</div>
                        <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Wilayah RT</div>
                    </div>
                    <div>
                        <div class="font-serif text-fluid-4xl text-white mb-1">{{ $totalWarga }}</div>
                        <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Warga Terdaftar</div>
                    </div>
                    <div>
                        <div class="font-serif text-fluid-4xl text-white mb-1">{{ $totalInfo }}</div>
                        <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">Informasi</div>
                    </div>
                    <div>
                        <div class="font-serif text-fluid-4xl text-white mb-1">{{ $totalUmkm }}</div>
                        <div class="text-fluid-xs uppercase tracking-[0.2em] text-white/50">UMKM</div>
                    </div>
                </div>
            @endif
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
                        <li class="flex gap-3"><span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">01</span> Menyediakan informasi yang mudah diakses warga</li>
                        <li class="flex gap-3"><span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">02</span> Mendukung usaha dan kegiatan warga</li>
                        <li class="flex gap-3"><span class="text-sage-700 dark:text-sage-400 mt-1.5 text-fluid-xs">03</span> Meningkatkan pelayanan kampung</li>
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
                <h2 class="font-serif text-fluid-5xl leading-[1.05] tracking-tight max-w-3xl">Apa yang kami sediakan</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-10">
                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Informasi Warga</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">Pengumuman, agenda, dan berita terbaru seputar kampung.</p>
                </div>
                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Kegiatan Kampung</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">Jadwal dan dokumentasi berbagai kegiatan warga.</p>
                </div>
                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0H9"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">UMKM Warga</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">Dukung dan temukan usaha dari warga sekitar.</p>
                </div>
                <div>
                    <svg class="w-6 h-6 text-sage-700 dark:text-sage-400 mb-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-fluid-lg font-semibold mb-3">Pengaduan</h3>
                    <p class="text-fluid-sm text-ink-600 dark:text-ink-400 leading-relaxed">Sampaikan keluhan atau saran untuk kampung yang lebih baik.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== INFORMASI (HANYA KALAU LOGIN) ==================== --}}
    @if ($isLoggedIn)
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
                                    class="w-[80vw] xs:w-[75vw] sm:w-[360px] md:w-[380px] lg:w-[400px] card-clean rounded-2xl overflow-hidden cursor-pointer card-clickable">
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
                                        <div class="text-fluid-xs uppercase tracking-[0.15em] text-ink-500 dark:text-ink-400 mb-3">{{ $info->tanggal?->format('d M Y') }}</div>
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

        {{-- ==================== KEGIATAN (HANYA KALAU LOGIN) ==================== --}}
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
                                    class="w-[80vw] xs:w-[75vw] sm:w-[360px] md:w-[380px] lg:w-[400px] card-clean rounded-2xl overflow-hidden cursor-pointer card-clickable">
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
    @endif

    {{-- ==================== UMKM (SELALU TAMPIL) ==================== --}}
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
                                data-meta="{{ $u->alamat }}"
                                data-whatsapp="{{ $u->whatsapp ? \App\Helpers\PhoneHelper::waLink($u->whatsapp, 'Halo, saya tertarik dengan ' . $u->nama_usaha . '. Apakah masih tersedia?') : '' }}"
                                class="w-[70vw] xs:w-[65vw] sm:w-[300px] md:w-[320px] lg:w-[340px] card-clean rounded-2xl overflow-hidden cursor-pointer card-clickable">
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
                                    <div class="text-fluid-xs uppercase tracking-[0.15em] text-sage-700 dark:text-sage-400 mb-2 font-medium">{{ $u->kategori->nama_kategori ?? '-' }}</div>
                                    <h3 class="text-fluid-base font-semibold leading-snug mb-2 line-clamp-2">{{ $u->nama_usaha }}</h3>
                                    <p class="text-fluid-xs text-ink-500 dark:text-ink-400 leading-relaxed line-clamp-2 mb-3">{{ $u->alamat }}</p>

                                    @if ($u->whatsapp)
                                        <a href="{{ \App\Helpers\PhoneHelper::waLink($u->whatsapp, 'Halo, saya tertarik dengan ' . $u->nama_usaha . '. Apakah masih tersedia?') }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            onclick="event.stopPropagation()"
                                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-[#25D366] text-white text-xs font-medium hover:bg-[#1da851] transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                            </svg>
                                            Chat WhatsApp
                                        </a>
                                    @endif
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
        </div>
    </section>

    {{-- ==================== FOOTER ==================== --}}
    <footer class="border-t border-ink-200 dark:border-ink-800 mt-16">
        <div class="container-fluid py-12 sm:py-16">
            
            {{-- Grid Utama --}}
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-10 mb-10">
                
                {{-- Kolom 1: Logo + Deskripsi --}}
                <div class="md:col-span-5">
                    <div class="mb-4">
                        <img src="{{ asset('storage/logo/trimulyo.png') }}"
                            alt="Logo {{ $rw->nama_rw ?? 'Kampung Trimulyo' }}"
                            class="h-10 sm:h-12 w-auto max-w-[140px] sm:max-w-[200px] object-contain">
                    </div>
                    <p class="text-fluid-sm text-ink-500 dark:text-ink-400 max-w-sm leading-relaxed">
                        Sistem informasi kampung digital untuk warga {{ $rw->nama_rw ?? 'RW 02' }}.
                    </p>
                </div>

                {{-- Kolom 2: Navigasi --}}
                <div class="md:col-span-3">
                    <h4 class="text-fluid-xs font-semibold uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">
                        Navigasi
                    </h4>
                    <ul class="space-y-2.5 text-fluid-sm">
                        <li><a href="#tentang" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Tentang</a></li>
                        <li><a href="#layanan" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Layanan</a></li>
                        @if ($isLoggedIn)
                            <li><a href="#informasi" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Informasi</a></li>
                            <li><a href="#kegiatan" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Kegiatan</a></li>
                        @endif
                    </ul>
                </div>

                {{-- Kolom 3: Lainnya --}}
                <div class="md:col-span-4">
                    <h4 class="text-fluid-xs font-semibold uppercase tracking-[0.2em] text-ink-500 dark:text-ink-400 mb-4">
                        Lainnya
                    </h4>
                    <ul class="space-y-2.5 text-fluid-sm">
                        <li><a href="#umkm" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">UMKM</a></li>
                        @if ($isLoggedIn)
                            <li><a href="{{ url('/' . Auth::user()->role . '/dashboard') }}" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="text-ink-600 dark:text-ink-400 hover:text-sage-700 dark:hover:text-sage-400 transition-colors">Masuk</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Copyright di Bawah (Full Width) --}}
            <div class="pt-6 border-t border-ink-200 dark:border-ink-800 flex flex-col sm:flex-row justify-between items-center gap-3 text-fluid-xs text-ink-500 dark:text-ink-400">
                <div>
                    &copy; {{ date('Y') }} - Trimulyo02 - Made By Kelompok 02
                </div>
                <div>
                    Sistem Informasi Kampung Digital
                </div>
            </div>
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
                    transition-all duration-300 hover:scale-105">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    {{-- ==================== MODAL ==================== --}}
    <div id="modal" class="hidden fixed inset-0 z-[100] items-center justify-center p-3 sm:p-6"
        style="background: rgba(0,0,0,0.75);">
        <div class="card-clean rounded-2xl w-full max-w-3xl max-h-[92vh] overflow-y-auto relative" style="animation: modalIn 0.25s ease-out;">
            <button onclick="closeModal()"
                    aria-label="Tutup"
                    class="absolute top-3 right-3 sm:top-4 sm:right-4 z-10 w-10 h-10 rounded-full
                            bg-white/95 dark:bg-ink-800/95
                            flex items-center justify-center
                            text-ink-900 dark:text-ink-100
                            hover:bg-white dark:hover:bg-ink-700 transition-colors">
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

                <div id="modalWhatsapp" class="mt-6 pt-5 border-t border-ink-200 dark:border-ink-800 hidden">
                    <a id="modalWhatsappLink" href="#"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#25D366] text-white text-sm font-semibold hover:bg-[#1da851] transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Chat WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SCRIPT ==================== --}}
    <script>
        function toggleTheme(button = null) {
            const html = document.documentElement;
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');

            if (button) {
                button.classList.remove('theme-toggle-rotate');
                void button.offsetWidth;
                button.classList.add('theme-toggle-rotate');
            }
        }

        const navbar = document.getElementById('navbar');
        const backToTop = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (navbar) {
                if (window.pageYOffset > 20) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            }

            if (window.pageYOffset > 600) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
            }
        }, { passive: true });

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const iconHamburger = document.getElementById('iconHamburger');
            const iconClose = document.getElementById('iconClose');

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                iconHamburger.classList.add('hidden');
                iconClose.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                iconHamburger.classList.remove('hidden');
                iconClose.classList.add('hidden');
            }
        }

        function closeMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const iconHamburger = document.getElementById('iconHamburger');
            const iconClose = document.getElementById('iconClose');

            menu.classList.add('hidden');
            iconHamburger.classList.remove('hidden');
            iconClose.classList.add('hidden');
        }

        function scrollH(id, dir) {
            const el = document.getElementById(id);
            if (!el) return;
            const card = el.querySelector('article');
            const step = card ? card.offsetWidth + 24 : 400;
            el.scrollBy({ left: dir * step, behavior: 'smooth' });
        }

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
                    whatsapp: card.dataset.whatsapp || '',
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
                meta.textContent = '📍 ' + data.meta;
                meta.classList.remove('hidden');
            } else {
                meta.classList.add('hidden');
            }

            const waDiv = document.getElementById('modalWhatsapp');
            const waLink = document.getElementById('modalWhatsappLink');
            if (data.whatsapp && data.whatsapp.trim() !== '') {
                waLink.href = data.whatsapp;
                waDiv.classList.remove('hidden');
            } else {
                waDiv.classList.add('hidden');
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
    </script>

</body>
</html>