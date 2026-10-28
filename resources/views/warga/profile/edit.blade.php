@extends('layouts.dashboard-warga')

@section('title', 'Profil Saya')

@section('content')

    <div class="mx-auto w-full max-w-5xl">

        @if (session('success'))
            <div class="dashboard-notice mb-5 p-4">
                <x-icon name="circle-check" />
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="dashboard-notice mb-5 items-start border-l-red-300 p-4">
                <x-icon name="alert" />
                <div>
                    <p class="mb-1 font-bold">Ada kesalahan:</p>
                    <ul class="ml-4 list-disc text-sm">
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Header --}}
        <div class="dashboard-welcome-card mb-5 p-5 text-white sm:p-6">
            <h2 class="mb-1 flex items-center gap-2 text-2xl font-bold"><x-icon name="user" /> Profil Saya</h2>
            <p>Kelola informasi pribadi kamu</p>
        </div>

        {{-- NIK (readonly) --}}
        <div class="dashboard-notice mb-5 p-4">
            <x-icon name="lock" />
            <p class="min-w-0 break-words text-sm">
                <b>NIK:</b> <span class="font-mono">{{ $warga->nik }}</span>
                <span class="text-ink-300">(tidak bisa diubah)</span>
            </p>
        </div>

        <form method="POST" action="{{ route('warga.profile.update') }}" class="space-y-5">
            @csrf @method('PUT')

            {{-- Akun --}}
            <div class="dashboard-card bg-white p-5 sm:p-6">
                <h3 class="mb-5 flex items-center gap-2 border-b border-white/10 pb-4 text-lg font-bold text-gray-800">
                    <x-icon name="lock" /> Informasi Akun
                </h3>

                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Nama (Akun) <span class="text-red-500">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $warga->user->name) }}" required
                           class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            {{-- Data Diri --}}
            <div class="dashboard-card bg-white p-5 sm:p-6">
                <h3 class="mb-5 flex items-center gap-2 border-b border-white/10 pb-4 text-lg font-bold text-gray-800">
                    <x-icon name="clipboard" /> Data Diri
                </h3>

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}" required
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="jenis_kelamin" required
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="L" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $warga->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $warga->tanggal_lahir?->format('Y-m-d')) }}" required
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $warga->no_hp) }}"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" rows="3"
                                  class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none focus:ring-2 focus:ring-indigo-500">{{ old('alamat', $warga->alamat) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('warga.dashboard') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl bg-gray-200 px-8 py-3 font-semibold text-gray-700 transition hover:bg-gray-300">
                    Batal
                </a>
                <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl bg-indigo-600 px-8 py-3 font-semibold text-white transition hover:bg-indigo-700">
                    <x-icon name="check" size="h-5 w-5" /> Update Profil
                </button>
            </div>
        </form>
    </div>

@endsection