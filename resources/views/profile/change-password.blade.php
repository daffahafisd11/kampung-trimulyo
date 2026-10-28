@extends('layouts.profile')

@section('title', 'Ganti Password')

@section('content')

    <div class="mx-auto max-w-2xl">

        @if (session('success'))
            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-50 p-4 text-sage-900">
                <x-icon name="circle-check" size="h-5 w-5 mt-0.5" />
                <p class="text-sm font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800">
                <x-icon name="alert" size="h-5 w-5 mt-0.5" />
                <div>
                    <p class="mb-1 font-semibold">Ada kesalahan:</p>
                    <ul class="list-inside list-disc space-y-1 text-sm">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-sage-200 bg-sage-100/70 p-4 text-sage-900">
            <x-icon name="info" size="h-5 w-5 mt-0.5" />
            <div>
                <p class="mb-1 font-semibold">Tips keamanan</p>
                <p class="text-sm leading-relaxed text-sage-800">Password baru minimal 6 karakter. Pastikan mudah diingat tapi sulit ditebak.</p>
            </div>
        </div>

        <form method="POST" action="{{ route('profile.change-password.update') }}">
            @csrf

            <section class="card-editorial overflow-hidden rounded-3xl shadow-[0_16px_48px_rgba(61,74,48,0.08)]">
                <div class="border-b border-sage-100 px-6 py-7 sm:px-8">
                    <div class="flex items-start gap-4">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-sage-100 text-sage-700">
                            <x-icon name="lock" size="h-6 w-6" />
                        </div>
                        <div>
                            <p class="mb-1 text-xs font-semibold uppercase tracking-[0.18em] text-sage-700">Keamanan akun</p>
                            <h1 class="font-serif text-3xl text-ink-900">Ganti Password</h1>
                            <p class="mt-2 text-sm leading-relaxed text-ink-500">Perbarui password untuk menjaga akun Kampung Trimulyo tetap aman.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-5 px-6 py-7 sm:px-8">
                    <div>
                        <label for="current_password" class="mb-2 block text-sm font-semibold text-ink-700">Password lama <span class="text-red-600">*</span></label>
                        <input id="current_password" type="password" name="current_password" required autocomplete="current-password"
                               placeholder="Masukkan password lama"
                               class="w-full rounded-xl border border-ink-200 bg-sage-50/50 px-4 py-3 text-sm text-ink-900 outline-none transition placeholder:text-ink-400 focus:border-sage-500 focus:bg-white focus:ring-4 focus:ring-sage-100">
                    </div>

                    <div>
                        <label for="new_password" class="mb-2 block text-sm font-semibold text-ink-700">Password baru <span class="text-red-600">*</span></label>
                        <input id="new_password" type="password" name="new_password" required autocomplete="new-password"
                               placeholder="Masukkan password baru"
                               class="w-full rounded-xl border border-ink-200 bg-sage-50/50 px-4 py-3 text-sm text-ink-900 outline-none transition placeholder:text-ink-400 focus:border-sage-500 focus:bg-white focus:ring-4 focus:ring-sage-100">
                        <p class="mt-2 text-xs text-ink-500">Gunakan minimal 6 karakter.</p>
                    </div>

                    <div>
                        <label for="new_password_confirmation" class="mb-2 block text-sm font-semibold text-ink-700">Konfirmasi password baru <span class="text-red-600">*</span></label>
                        <input id="new_password_confirmation" type="password" name="new_password_confirmation" required autocomplete="new-password"
                               placeholder="Ulangi password baru"
                               class="w-full rounded-xl border border-ink-200 bg-sage-50/50 px-4 py-3 text-sm text-ink-900 outline-none transition placeholder:text-ink-400 focus:border-sage-500 focus:bg-white focus:ring-4 focus:ring-sage-100">
                    </div>

                    <div class="flex flex-col-reverse gap-3 border-t border-sage-100 pt-5 sm:flex-row sm:justify-end">
                        <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center rounded-full border border-ink-200 px-6 py-3 text-sm font-semibold text-ink-700 transition hover:border-sage-400 hover:bg-sage-50">
                            Batal
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-sage-800 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-sage-900 focus:outline-none focus:ring-4 focus:ring-sage-200">
                            <x-icon name="check" size="h-4 w-4" />
                            Simpan password
                        </button>
                    </div>
                </div>
            </section>
        </form>
    </div>

@endsection