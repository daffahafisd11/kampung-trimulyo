@extends('layouts.dashboard')

@section('title', 'Kas Semua RT')

@section('content')

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Kas Semua RT</h3>
            <p class="text-sm text-gray-500 mt-1">Rekap saldo kas seluruh RT</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">RT</th>
                        <th class="px-4 py-3 text-left">Bendahara</th>
                        <th class="px-4 py-3 text-right">Masuk</th>
                        <th class="px-4 py-3 text-right">Keluar</th>
                        <th class="px-4 py-3 text-right">Saldo</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($data as $i => $d)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $d['rt']->nama_rt }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $d['bendahara']->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-right text-green-600 font-medium">
                                Rp {{ number_format($d['total_masuk'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-right text-red-600 font-medium">
                                Rp {{ number_format($d['total_keluar'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-right font-bold text-emerald-700">
                                Rp {{ number_format($d['saldo'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('rw.kas.show', $d['rt']->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-12 text-gray-500">Belum ada data kas.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection