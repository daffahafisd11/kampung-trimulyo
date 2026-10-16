@extends('layouts.dashboard-rt')

@section('title', 'Informasi RT')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">📰 Informasi RT</h2>
        <p class="text-teal-100">Kelola informasi & pengumuman untuk warga {{ Auth::user()->rt->nama_rt ?? 'RT' }}</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('rt.informasi.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search"
                   placeholder="Cari judul..."
                   value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
            <button type="submit" class="bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition font-semibold">
                🔍 Cari
            </button>
            @if (request('search'))
                <a href="{{ route('rt.informasi.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar Informasi</h3>
            <a href="{{ route('rt.informasi.create') }}" class="bg-teal-600 text-white px-5 py-2 rounded-lg hover:bg-teal-700 transition font-semibold text-sm">
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
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($informasi as $i => $info)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $informasi->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $info->judul }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $info->tanggal?->format('d/m/Y') ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                @if ($info->status == 'dipublikasikan')
                                    <span class="px-2 py-1 rounded-full text-xs bg-green-100 text-green-700 font-semibold">✅ Dipublikasikan</span>
                                @else
                                    <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 font-semibold">📝 Draft</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('rt.informasi.edit', $info->id) }}" class="text-teal-600 hover:text-teal-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('rt.informasi.destroy', $info->id) }}" onsubmit="return confirm('Hapus informasi ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-12 text-gray-500">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $informasi->links() }}
        </div>
    </div>

@endsection