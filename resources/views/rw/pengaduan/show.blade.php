@extends('layouts.dashboard')

@section('title', 'Detail Pengaduan')

@section('content')

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('rw.pengaduan.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke Pengaduan</a>
        </div>

        {{-- Detail Pengaduan --}}
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ $pengaduan->judul }}</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">RT</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->rt->nama_rt ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Warga</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->warga->nama_lengkap ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Kategori</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->kategori->nama_kategori ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Status</p>
                    <span class="inline-block px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                        {{ str_replace('_', ' ', $pengaduan->status) }}
                    </span>
                </div>
                <div class="md:col-span-2 bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Lokasi</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->lokasi }}</p>
                </div>
                <div class="md:col-span-2 bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Deskripsi</p>
                    <p class="text-gray-800">{{ $pengaduan->deskripsi }}</p>
                </div>
            </div>
        </div>

        {{-- Riwayat --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <span>📜</span> Riwayat Pengaduan
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Waktu</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-left">Catatan</th>
                            <th class="px-4 py-3 text-left">Oleh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($pengaduan->riwayat as $r)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-600">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 font-semibold">
                                        {{ str_replace('_', ' ', $r->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-800">{{ $r->catatan ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $r->user->name ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection