@extends('layouts.dashboard')

@section('title', 'Detail UMKM')

@section('content')

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('rw.umkm.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke UMKM</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            {{-- Header / Gambar --}}
            @if ($umkm->foto)
                <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center">
                    <span class="text-white text-6xl">🏪</span>
                </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="inline-block bg-emerald-100 text-emerald-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                            {{ $umkm->kategori->nama_kategori ?? '-' }}
                        </span>
                        <h1 class="text-3xl font-bold text-gray-800">{{ $umkm->nama_usaha }}</h1>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                        {{ str_replace('_', ' ', $umkm->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">Pemilik</p>
                        <p class="font-semibold text-gray-800">{{ $umkm->warga->nama_lengkap ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">RT</p>
                        <p class="font-semibold text-gray-800">{{ $umkm->warga->rt->nama_rt ?? '-' }}</p>
                    </div>
                    <div class="md:col-span-2 bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">Deskripsi</p>
                        <p class="text-gray-800">{{ $umkm->deskripsi }}</p>
                    </div>
                    <div class="md:col-span-2 bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">Alamat</p>
                        <p class="text-gray-800">{{ $umkm->alamat }}</p>
                    </div>
                </div>

                {{-- Aksi --}}
                <div class="flex gap-3">
                    <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank" class="bg-green-500 text-white px-6 py-2.5 rounded-lg hover:bg-green-600 transition font-semibold shadow-md">
                        💬 Hubungi WhatsApp ({{ $umkm->whatsapp }})
                    </a>
                    <a href="{{ route('rw.umkm.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection