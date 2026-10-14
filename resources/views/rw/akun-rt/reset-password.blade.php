@extends('layouts.dashboard')

@section('title', 'Reset Password Akun RT')

@section('content')

    <div class="max-w-2xl">
        <div class="mb-6">
            <a href="{{ route('rw.akun-rt.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke Akun RT</a>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg mb-6">
                <p class="font-bold mb-1">Ada kesalahan:</p>
                <ul class="list-disc ml-4 text-sm">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-orange-50 border-l-4 border-orange-500 text-orange-800 p-4 rounded-lg mb-6">
            <p class="font-bold mb-1">⚠️ Perhatian</p>
            <p class="text-sm">Password akan diganti. Pastikan memberitahu user yang bersangkutan setelah reset.</p>
        </div>

        <form method="POST" action="{{ route('rw.akun-rt.reset-password.update', $user->id) }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span>🔒</span> Reset Password: {{ $user->name }}
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru <span class="text-red-500">*</span></label>
                        <input type="password" name="password" required
                               placeholder="Masukkan password baru"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation" required
                               placeholder="Ulangi password baru"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600 transition font-semibold shadow-md"
                        onclick="return confirm('Yakin reset password user ini?')">
                    🔑 Reset Password
                </button>
                <a href="{{ route('rw.akun-rt.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection