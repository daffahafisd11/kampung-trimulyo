@extends('layouts.dashboard')

@section('title', 'Informasi')

@section('content')

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar Informasi</h3>
            <a href="{{ route('rw.informasi.create') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-lg hover:bg-emerald-700 transition font-semibold text-sm">
                + Tambah Informasi
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($informasi as $i => $info)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $informasi->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $info->judul }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $info->tanggal?->format('d M Y') ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('rw.informasi.edit', $info->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('rw.informasi.destroy', $info->id) }}" onsubmit="return confirm('Hapus?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-12 text-gray-500">Belum ada informasi.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $informasi->links() }}
        </div>
    </div>

@endsection