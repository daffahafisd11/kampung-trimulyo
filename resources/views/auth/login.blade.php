<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - {{ config('app.name', 'Kampung Trimulyo') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .font-serif { font-family: 'Instrument Serif', Georgia, serif; }

        /* ==================== CARD LOGIN — GLASSMORPHISM DARK ==================== */
        .card-login {
            /* Dark glass — transparan hitam */
            background: rgba(30, 32, 34, 0.4);

            /* Blur kuat untuk efek kaca */
            backdrop-filter: blur(30px) saturate(180%);
            -webkit-backdrop-filter: blur(30px) saturate(180%);

            /* Border putih transparan */
            border: 1.5px solid rgba(255, 255, 255, 0.18);

            /* Shadow + inner highlight */
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.6),
                0 8px 20px rgba(0, 0, 0, 0.4),
                inset 0 1px 0 rgba(255, 255, 255, 0.15),
                inset 0 -1px 0 rgba(255, 255, 255, 0.05);
        }

        /* ==================== INPUT LOGIN ==================== */
        .input-login {
            background: rgba(20, 22, 24, 0.5);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #efefec;
            transition: all 0.3s ease;
        }

        .input-login::placeholder {
            color: #6a6a6a;
        }

        .input-login:focus {
            border-color: #8a9a7a;
            box-shadow: 0 0 0 3px rgba(138, 154, 122, 0.2);
            outline: none;
        }

        /* ==================== ANIMATIONS ==================== */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.96) translateY(10px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .animate-slide-up {
            animation: slideUp 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .delay-100 { animation-delay: 0.1s; opacity: 0; animation-fill-mode: forwards; }
        .delay-200 { animation-delay: 0.2s; opacity: 0; animation-fill-mode: forwards; }
        .delay-300 { animation-delay: 0.3s; opacity: 0; animation-fill-mode: forwards; }
    </style>
</head>
<body class="min-h-screen antialiased bg-[#0e0e0e]">
    <div class="fixed inset-0 z-0 overflow-hidden">
        <img src="{{ asset('storage/hero/back.jpg') }}"
                alt="Background"
                class="w-full h-full object-cover">

        {{-- Overlay gelap --}}
        <div class="absolute inset-0 bg-gradient-to-b from-ink-900/40 via-ink-900/55 to-ink-900/80"></div>
    </div>

    {{-- ==================== KONTEN UTAMA ==================== --}}
    <div class="relative z-10 min-h-screen flex flex-col">

        {{-- ==================== CARD LOGIN DI TENGAH ==================== --}}
        <div class="flex-1 flex items-center justify-center px-4 sm:px-6 py-12">

            <div class="w-full max-w-md card-login rounded-3xl p-8 sm:p-10 animate-scale-in">

                {{-- ==================== LOGO DI TENGAH ==================== --}}
                <div class="flex justify-center mb-8 animate-slide-up">
                    <img src="{{ asset('storage/logo/trimulyo.png') }}"
                            alt="Logo {{ config('app.name', 'Kampung Trimulyo') }}"
                            class="h-16 sm:h-20 w-auto max-w-[240px] object-contain">
                </div>

                {{-- ==================== HEADER ==================== --}}
                <div class="mb-8 text-center animate-slide-up delay-100">
                    <h1 class="font-serif text-3xl sm:text-4xl tracking-tight mb-2 text-white">
                        Masuk
                    </h1>
                    <p class="text-sm text-white/70">
                        Masukkan email dan password akun Anda.
                    </p>
                </div>

                {{-- ==================== ERROR MESSAGE ==================== --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-2xl bg-red-500/20 border border-red-400/40 backdrop-blur-sm">
                        @foreach ($errors->all() as $error)
                            <p class="text-sm text-red-200 flex items-start gap-2">
                                <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v4M12 16h.01"/>
                                </svg>
                                {{ $error }}
                            </p>
                        @endforeach
                    </div>
                @endif

                {{-- ==================== FORM ==================== --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div class="animate-slide-up delay-200">
                        <label for="email" class="block text-sm font-medium mb-2 text-white/90">
                            Email
                        </label>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="nama@email.com"
                                    required
                                    autofocus
                                    class="input-login w-full pl-12 pr-4 py-3.5 rounded-2xl">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="animate-slide-up delay-200">
                        <label for="password" class="block text-sm font-medium mb-2 text-white/90">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute left-4 top-1/2 -translate-y-1/2 text-white/50 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
                                </svg>
                            </div>
                            <input id="password"
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    required
                                    class="input-login w-full pl-12 pr-12 py-3.5 rounded-2xl">

                            {{-- Toggle Password --}}
                            <button type="button"
                                    onclick="togglePassword()"
                                    aria-label="Lihat password"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full flex items-center justify-center text-white/50 hover:bg-white/10 transition-colors">
                                <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit"
                            class="w-full py-3.5 rounded-2xl
                                    bg-sage-600 hover:bg-sage-500
                                    text-white
                                    font-semibold
                                    hover:scale-[1.01] active:scale-[0.99]
                                    transition-all duration-300
                                    shadow-lg shadow-sage-600/30
                                    animate-slide-up delay-300">
                        Masuk
                    </button>
                </form>

                {{-- ==================== LINK KEMBALI ==================== --}}
                <div class="mt-6 text-center animate-slide-up delay-300">
                    <a href="{{ route('landing') }}"
                        class="inline-flex items-center gap-2 text-sm text-white/70 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>

        {{-- ==================== FOOTER ==================== --}}
        <footer class="relative z-10 py-6 text-center text-xs text-white/60 animate-fade-in">
            <div>&copy; {{ date('Y') }} - Trimulyo02 - Made By Kelompok 02</div>
        </footer>
    </div>

    {{-- ==================== SCRIPT ==================== --}}
    <script>
        document.documentElement.classList.add('dark');

        // ==================== TOGGLE PASSWORD ====================
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
            } else {
                input.type = 'password';
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
            }
        }
    </script>

</body>
</html>