@extends('layouts.dashboard-rt')

@section('title', 'UMKM RT')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">🛒 UMKM di RT Saya</h2>
        <p class="text-teal-100">Verifikasi & kelola UMKM warga {{ Auth::user()->rt->nama_rt ?? 'RT' }}</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('rt.umkm.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search"
                   placeholder="Cari nama usaha..."
                   value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
            <select name="status" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>✅ Disetujui</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
            </select>
            <button type="submit" class="bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition font-semibold">
                🔍 Cari
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('rt.umkm.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar UMKM</h3>
            <span class="text-sm text-gray-500">Total: {{ $umkm->total() }}</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama Usaha</th>
                        <th class="px-4 py-3 text-left">Warga</th>
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
                            <td class="px-4 py-3 text-gray-600">{{ $u->warga->nama_lengkap ?? '-' }}</td>
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
                            <td class="px-4 py-3 text-center">
                                @if ($u->status === 'menunggu_verifikasi')
                                    <div class="flex justify-center gap-2">
                                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" class="inline">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="disetujui">
                                            <button class="bg-green-500 text-white px-3 py-1.5 rounded-lg text-xs hover:bg-green-600 transition font-semibold">
                                                ✅ Setujui
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('rt.umkm.updateStatus', $u->id) }}" class="inline" onsubmit="return confirm('Tolak UMKM ini?')">
                                            @csrf @method('PUT')
                                            <input type="hidden" name="status" value="ditolak">
                                            <button class="bg-red-500 text-white px-3 py-1.5 rounded-lg text-xs hover:bg-red-600 transition font-semibold">
                                                ❌ Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-12 text-gray-500">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $umkm->links() }}
        </div>
    </div>

@endsection