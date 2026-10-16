@extends('layouts.profile')

@section('title', 'Ganti Password')

@section('content')

    <div class="max-w-2xl mx-auto">

        @if (session('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif

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

        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg mb-6">
            <p class="font-bold mb-1">💡 Info</p>
            <p class="text-sm">Password baru minimal 6 karakter. Pastikan mudah diingat tapi sulit ditebak.</p>
        </div>

        <form method="POST" action="{{ route('profile.change-password.update') }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl shadow-md p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-2 flex items-center gap-2">
                    <span>🔒</span> Ganti Password
                </h1>
                <p class="text-sm text-gray-500 mb-6">Ubah password akun kamu untuk keamanan</p>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Lama <span class="text-red-500">*</span></label>
                        <input type="password" name="current_password" required
                               placeholder="Masukkan password lama"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru (min 6 karakter) <span class="text-red-500">*</span></label>
                        <input type="password" name="new_password" required
                               placeholder="Masukkan password baru"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru <span class="text-red-500">*</span></label>
                        <input type="password" name="new_password_confirmation" required
                               placeholder="Ulangi password baru"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                </div>

                <div class="flex gap-3 mt-8">
                    <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700 transition font-semibold shadow-md">
                        💾 Simpan Password
                    </button>
                    <a href="{{ url()->previous() }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>

@endsection