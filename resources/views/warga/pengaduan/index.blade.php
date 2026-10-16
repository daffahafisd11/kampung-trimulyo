@extends('layouts.dashboard-warga')

@section('title', 'Pengaduan Saya')

@section('content')

    {{-- Header --}}
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">📢 Pengaduan Saya</h2>
        <p class="text-indigo-100">Kelola pengaduan yang kamu ajukan</p>
    </div>

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg mb-6">
            ❌ {{ session('error') }}
        </div>
    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('warga.pengaduan.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search"
                   placeholder="Cari judul pengaduan..."
                   value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            <select name="status" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                <option value="">Semua Status</option>
                <option value="menunggu_verifikasi" {{ request('status') == 'menunggu_verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>📥 Diterima</option>
                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
            </select>
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg hover:bg-indigo-700 transition font-semibold">
                🔍 Cari
            </button>
            @if (request('search') || request('status'))
                <a href="{{ route('warga.pengaduan.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar Pengaduan</h3>
            <a href="{{ route('warga.pengaduan.create') }}" class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition font-semibold text-sm">
                + Ajukan Pengaduan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Judul</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($pengaduan as $i => $p)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $pengaduan->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $p->judul }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->kategori->nama_kategori ?? '-' }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $p->created_at?->format('d M Y') ?? '-' }}</td>
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
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('warga.pengaduan.show', $p->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Lihat</a>
                                    @if ($p->status === 'menunggu_verifikasi')
                                        <a href="{{ route('warga.pengaduan.edit', $p->id) }}" class="text-yellow-600 hover:text-yellow-800 font-medium">Edit</a>
                                        <form method="POST" action="{{ route('warga.pengaduan.destroy', $p->id) }}" onsubmit="return confirm('Hapus pengaduan ini?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-12 text-gray-500">
                            Belum ada pengaduan. <a href="{{ route('warga.pengaduan.create') }}" class="text-indigo-600 font-medium">Ajukan sekarang →</a>
                        </td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $pengaduan->links() }}
        </div>
    </div>

@endsection