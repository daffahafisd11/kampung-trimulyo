@extends('layouts.dashboard-warga')

@section('title', 'Detail UMKM')

@section('content')

    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('warga.umkm.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">← Kembali ke UMKM Saya</a>
        </div>

        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            @if ($umkm->foto)
                <img src="{{ asset('storage/' . $umkm->foto) }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center">
                    <span class="text-white text-6xl">🏪</span>
                </div>
            @endif

            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                            {{ $umkm->kategori->nama_kategori ?? '-' }}
                        </span>
                        <h1 class="text-2xl font-bold text-gray-800">{{ $umkm->nama_usaha }}</h1>
                    </div>
                    @php
                        $warna = [
                            'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                            'disetujui' => 'bg-green-100 text-green-700',
                            'ditolak' => 'bg-red-100 text-red-700',
                        ][$umkm->status] ?? 'bg-gray-100 text-gray-700';
                    @endphp
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                        {{ str_replace('_', ' ', $umkm->status) }}
                    </span>
                </div>

                <div class="space-y-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">Deskripsi</p>
                        <p class="text-gray-800">{{ $umkm->deskripsi }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">📍 Alamat</p>
                        <p class="text-gray-800">{{ $umkm->alamat }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500 mb-1">📱 WhatsApp</p>
                        <p class="text-gray-800 font-mono">{{ $umkm->whatsapp }}</p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <a href="https://wa.me/{{ $umkm->whatsapp }}" target="_blank"
                       class="bg-green-500 text-white px-6 py-2.5 rounded-lg hover:bg-green-600 transition font-semibold">
                        💬 Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('warga.umkm.edit', $umkm->id) }}" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg hover:bg-indigo-700 transition font-semibold">
                        ✏️ Edit
                    </a>
                    <a href="{{ route('warga.umkm.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection