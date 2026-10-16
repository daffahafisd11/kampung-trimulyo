@extends('layouts.dashboard-warga')

@section('title', 'UMKM Saya')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">🛒 UMKM Saya</h2>
        <p class="text-indigo-100">Kelola usaha yang kamu daftarkan</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('warga.umkm.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search"
                   placeholder="Cari nama usaha..."
                   value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            <select name="status" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>✅ Disetujui</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
            </select>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg hover:bg-indigo-700 transition font-semibold">
                🔍 Cari
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('warga.umkm.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar UMKM</h3>
            <a href="{{ route('warga.umkm.create') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition font-semibold text-sm">
                + Daftarkan UMKM
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama Usaha</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($umkm as $i => $u)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $umkm->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $u->nama_usaha }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $u->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                @php
                                    $warna = [
                                        'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                                        'disetujui' => 'bg-green-100 text-green-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ][$u->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                                    {{ str_replace('_', ' ', $u->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('warga.umkm.show', $u->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Lihat</a>
                                    <a href="{{ route('warga.umkm.edit', $u->id) }}" class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('warga.umkm.destroy', $u->id) }}" onsubmit="return confirm('Hapus UMKM ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-12 text-gray-500">
                            Belum ada UMKM. <a href="{{ route('warga.umkm.create') }}" class="text-indigo-600 font-medium">Daftarkan sekarang →</a>
                        </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $umkm->links() }}
        </div>
    </div>

@endsection