@extends('layouts.dashboard-bendahara')

@section('title', 'Kas RT')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-amber-600 to-amber-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">💰 Kas {{ Auth::user()->rt->nama_rt ?? 'RT' }}</h2>
        <p class="text-amber-100">Kelola pemasukan & pengeluaran kas RT</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
            <p class="text-sm text-gray-600 mb-1">Total Masuk</p>
            <p class="text-2xl font-bold text-green-700">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-red-500">
            <p class="text-sm text-gray-600 mb-1">Total Keluar</p>
            <p class="text-2xl font-bold text-red-700">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</p>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-amber-500">
            <p class="text-sm text-gray-600 mb-1">Saldo Akhir</p>
            <p class="text-2xl font-bold text-amber-700">Rp {{ number_format($saldo, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi</h3>
            <a href="{{ route('bendahara.kas.create') }}" class="bg-amber-600 text-white px-5 py-2 rounded-lg hover:bg-amber-700 transition font-semibold text-sm">
                + Catat Transaksi
            </a>
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
                        <th class="px-4 py-3 text-center">Aksi</th>
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
                            <td class="px-4 py-3 text-gray-600">{{ $t->kategori }}</td>
                            <td class="px-4 py-3 text-gray-800">{{ $t->keterangan }}</td>
                            <td class="px-4 py-3 text-right font-semibold {{ $t->jenis == 'masuk' ? 'text-green-700' : 'text-red-700' }}">
                                {{ $t->jenis == 'masuk' ? '+' : '-' }} Rp {{ number_format($t->jumlah, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('bendahara.kas.edit', $t->id) }}" class="text-amber-600 hover:text-amber-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('bendahara.kas.destroy', $t->id) }}" onsubmit="return confirm('Hapus transaksi ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
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