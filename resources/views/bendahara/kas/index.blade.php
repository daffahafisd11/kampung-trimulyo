@extends('layouts.dashboard-bendahara')

@section('title', 'Kas RT')

@section('content')

    {{-- Header --}}
    <div class="dashboard-welcome-card bg-gradient-to-r from-amber-600 to-amber-800 mb-6 p-5 text-white sm:p-7">
        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-amber-100/90">Pengelolaan keuangan</p>
        <h2 class="text-2xl font-bold sm:text-3xl">Kas {{ Auth::user()->rt->nama_rt ?? 'RT' }}</h2>
        <p class="text-amber-100">Kelola pemasukan & pengeluaran kas RT</p>
    </div>

    @if (session('success'))
        <div class="dashboard-card mb-6 border-l-4 border-emerald-600 bg-emerald-50/75 p-4 text-emerald-800 sm:p-5">
            {{ session('success') }}
        </div>
    @endif

    {{-- Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-green-500">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-gray-700">Total Masuk</p><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-500/10"><x-icon name="wallet" size="h-5 w-5 text-green-700" /></span></div>
            <p class="break-words text-xl font-bold tracking-tight text-green-800 sm:text-2xl">Rp {{ number_format($totalMasuk, 0, ',', '.') }}</p>
        </div>
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-red-500">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-gray-700">Total Keluar</p><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-red-500/10"><x-icon name="wallet" size="h-5 w-5 text-red-700" /></span></div>
            <p class="break-words text-xl font-bold tracking-tight text-red-800 sm:text-2xl">Rp {{ number_format($totalKeluar, 0, ',', '.') }}</p>
        </div>
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-amber-500">
            <div class="flex items-center justify-between"><p class="text-sm font-medium text-gray-700">Saldo Akhir</p><span class="flex h-10 w-10 items-center justify-center rounded-xl bg-amber-500/10"><x-icon name="wallet" size="h-5 w-5 text-amber-700" /></span></div>
            <p class="break-words text-xl font-bold tracking-tight text-amber-800 sm:text-2xl">Rp {{ number_format($saldo, 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Tabel --}}
    <div class="dashboard-card overflow-hidden bg-white">
        <div class="flex flex-col gap-3 border-b border-white/50 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <h3 class="text-lg font-bold text-gray-800">Riwayat Transaksi</h3>
            <a href="{{ route('bendahara.kas.create') }}" class="inline-flex items-center justify-center rounded-xl bg-amber-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-amber-700">
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

        <div class="border-t border-white/50 px-4 py-4 sm:px-6">
            {{ $transaksi->links() }}
        </div>
    </div>

@endsection