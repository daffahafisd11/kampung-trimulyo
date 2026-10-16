@extends('layouts.dashboard-rt')

@section('title', 'Pengaduan Masuk')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-teal-600 to-teal-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">📢 Pengaduan Masuk</h2>
        <p class="text-teal-100">Kelola pengaduan dari warga {{ Auth::user()->rt->nama_rt ?? 'RT' }}</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('rt.pengaduan.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search"
                   placeholder="Cari judul pengaduan..."
                   value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
            <select name="status" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>📥 Diterima</option>
                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
            </select>
            <button type="submit" class="bg-teal-600 text-white px-6 py-2.5 rounded-lg hover:bg-teal-700 transition font-semibold">
                🔍 Cari
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('rt.pengaduan.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar Pengaduan</h3>
            <span class="text-sm text-gray-500">Total: {{ $pengaduan->total() }}</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Warga</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengaduan as $i => $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $pengaduan->firstItem() + $i }}</td>
                            <td class="px-4 py-3 text-gray-800 font-medium">{{ $p->warga->nama_lengkap ?? '-' }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $p->judul }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                @php
                                    $warna = [
                                        'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                                        'diterima' => 'bg-blue-100 text-blue-700',
                                        'diproses' => 'bg-indigo-100 text-indigo-700',
                                        'selesai' => 'bg-green-100 text-green-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                    ][$p->status] ?? 'bg-gray-100 text-gray-700';
                                @endphp
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                                    {{ str_replace('_', ' ', $p->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('rt.pengaduan.show', $p->id) }}" class="text-teal-600 hover:text-teal-800 font-medium">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-12 text-gray-500">Tidak ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $pengaduan->links() }}
        </div>
    </div>

@endsection