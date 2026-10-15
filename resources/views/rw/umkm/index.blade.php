@extends('layouts.dashboard')

@section('title', 'Semua UMKM')

@section('content')

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Daftar UMKM</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama Usaha</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Pemilik</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($umkm as $i => $u)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $umkm->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $u->nama_usaha }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs bg-emerald-100 text-emerald-700">
                                    {{ $u->kategori->nama_kategori ?? '-' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $u->user->name ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('rw.umkm.show', $u->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Lihat</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-12 text-gray-500">Belum ada UMKM.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $umkm->links() }}
        </div>
    </div>

@endsection