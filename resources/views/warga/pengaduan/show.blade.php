@extends('layouts.dashboard-warga')

@section('title', 'Detail Pengaduan')

@section('content')

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('warga.pengaduan.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm">← Kembali ke Pengaduan</a>
        </div>

        {{-- Detail Pengaduan --}}
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $pengaduan->judul }}</h1>
                @php
                    $warna = [
                        'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                        'diterima' => 'bg-blue-100 text-blue-700',
                        'diproses' => 'bg-indigo-100 text-indigo-700',
                        'selesai' => 'bg-green-100 text-green-700',
                        'ditolak' => 'bg-red-100 text-red-700',
                    ][$pengaduan->status] ?? 'bg-gray-100 text-gray-700';
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                    {{ str_replace('_', ' ', $pengaduan->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Kategori</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->kategori->nama_kategori ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Lokasi</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->lokasi }}</p>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Deskripsi</p>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-800 whitespace-pre-line">{{ $pengaduan->deskripsi }}</div>
            </div>

            @if ($pengaduan->foto)
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-700 mb-2">Foto</p>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" class="rounded-lg shadow-md max-w-md border border-gray-200">
                </div>
            @endif

            @if ($pengaduan->catatan)
                <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                    <p class="text-sm font-bold text-blue-800 mb-1">Catatan Petugas</p>
                    <p class="text-blue-900">{{ $pengaduan->catatan }}</p>
                </div>
            @endif
        </div>

        {{-- Riwayat --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <span>📜</span> Riwayat Perubahan
                </h2>
            </div>

            <div class="p-6">
                <div class="space-y-4">
                    @forelse ($pengaduan->riwayat as $r)
                        <div class="flex gap-4">
                            <div class="w-3 h-3 rounded-full bg-indigo-500 mt-2 flex-shrink-0"></div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <span class="font-semibold text-gray-800">{{ str_replace('_', ' ', $r->status) }}</span>
                                    <span class="text-xs text-gray-500">{{ $r->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <p class="text-sm text-gray-600 mt-1">{{ $r->catatan ?? '-' }}</p>
                                <p class="text-xs text-gray-400 mt-1">oleh: {{ $r->user->name ?? '-' }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 py-8">Belum ada riwayat.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection