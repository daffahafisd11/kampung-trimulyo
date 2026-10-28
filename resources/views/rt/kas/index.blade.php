@extends('layouts.dashboard-rt')

@section('title', 'Kas RT')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="flex items-center gap-2 text-2xl font-bold mb-1"><x-icon name="wallet" /> Kas {{ $rt->nama_rt }}</h2>
        <p class="text-teal-100">RT hanya bisa melihat, tidak bisa mengubah</p>
    </div>

    {{-- Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between mb-2">
                <x-icon name="wallet" size="h-7 w-7 text-green-600" />
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">Masuk</span>
            </div>
            <p class="text-2xl font-bold text-green-700">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Masuk</p>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between mb-2">
                <x-icon name="wallet" size="h-7 w-7 text-red-600" />
                <span class="text-xs font-semibold text-red-600 bg-red-50 px-2 py-1 rounded-full">Keluar</span>
            </div>
            <p class="text-2xl font-bold text-red-700">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Keluar</p>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-teal-500">
            <div class="flex items-center justify-between mb-2">
                <x-icon name="wallet" size="h-7 w-7 text-teal-600" />
                <span class="text-xs font-semibold text-teal-600 bg-teal-50 px-2 py-1 rounded-full">Saldo</span>
            </div>
            <p class="text-2xl font-bold text-teal-700">Rp {{ number_format($saldo, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-1">Saldo Akhir</p>
        </div>
    </div>

    {{-- Tabel Transaksi --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center">Jenis</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Keterangan</th>
                        <th class="px-4 py-3 text-right">Jumlah</th>
                        <th class="px-4 py-3 text-left">Dicatat Oleh</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($transaksi as $t)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-gray-600">{{ $t->tanggal->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-center">
                                @if ($t->jenis == 'masuk')
                                    <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 font-semibold">Masuk</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs bg-red-100 text-red-700 font-semibold">Keluar</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $t->kategori ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-800">{{ $t->keterangan ?? '-' }}</td>
                            <td class="px-4 py-3 text-right font-semibold {{ $t->jenis == 'masuk' ? 'text-green-700' : 'text-red-700' }}">
                                {{ $t->jenis == 'masuk' ? '+' : '-' }} Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $t->user->name ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-12 text-gray-500">Belum ada transaksi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $transaksi->links() }}
        </div>
    </div>

@endsection