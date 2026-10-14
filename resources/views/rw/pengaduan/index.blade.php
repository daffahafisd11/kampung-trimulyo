@extends('layouts.dashboard')

@section('title', 'Semua Pengaduan')

@section('content')

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Daftar Pengaduan</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Pelapor</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengaduan as $i => $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $pengaduan->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $p->judul }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->user->name ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $p->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs bg-yellow-100 text-yellow-700">
                                    {{ $p->status ?? 'pending' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('rw.pengaduan.show', $p->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-12 text-gray-500">Belum ada pengaduan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $pengaduan->links() }}
        </div>
    </div>

@endsection