@extends('layouts.dashboard-rt')

@section('title', 'Detail Pengaduan')

@section('content')

    <div class="max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('rt.pengaduan.index') }}" class="text-teal-600 hover:text-teal-800 font-medium text-sm">← Kembali ke Pengaduan</a>
        </div>

        @if (session('success'))
            <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-600 text-red-800 p-4 rounded-lg mb-6">
                <p class="font-bold mb-1">Ada kesalahan:</p>
                <ul class="list-disc ml-4 text-sm">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Detail Pengaduan --}}
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $pengaduan->judul }}</h1>
                @php
                    $warna = [
                        'menunggu_verifikasi' => 'bg-yellow-100 text-yellow-700',
                        'diterima' => 'bg-blue-100 text-blue-700',
                        'diproses' => 'bg-indigo-100 text-indigo-700',
                        'selesai' => 'bg-green-100 text-green-700',
                        'ditolak' => 'bg-red-100 text-red-700',
                    ][$pengaduan->status] ?? 'bg-gray-100 text-gray-700';
                @endphp
                <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $warna }}">
                    {{ str_replace('_', ' ', $pengaduan->status) }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Warga</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->warga->nama_lengkap ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Kategori</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->kategori->nama_kategori ?? '-' }}</p>
                </div>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-xs text-gray-500 mb-1">Lokasi</p>
                    <p class="font-semibold text-gray-800">{{ $pengaduan->lokasi ?? '-' }}</p>
                </div>
            </div>

            <div class="mb-6">
                <p class="text-sm font-medium text-gray-700 mb-2">Deskripsi</p>
                <div class="bg-gray-50 rounded-lg p-4 text-gray-800 whitespace-pre-line">{{ $pengaduan->deskripsi }}</div>
            </div>

            @if ($pengaduan->foto)
                <div class="mb-6">
                    <p class="text-sm font-medium text-gray-700 mb-2">Foto</p>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" class="rounded-lg shadow-md max-w-md border border-gray-200">
                </div>
            @endif

            @if ($pengaduan->catatan)
                <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                    <p class="text-sm font-bold text-blue-800 mb-1">Catatan Terakhir</p>
                    <p class="text-blue-900">{{ $pengaduan->catatan }}</p>
                </div>
            @endif
        </div>

        {{-- Form Update Status --}}
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span>✏️</span> Ubah Status
            </h2>

            <form method="POST" action="{{ route('rt.pengaduan.updateStatus', $pengaduan->id) }}" class="space-y-4">
                @csrf @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Baru <span class="text-red-500">*</span></label>
                    <select name="status" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">
                        <option value="">-- Pilih --</option>
                        <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>📥 Diterima</option>
                        <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>🔄 Diproses</option>
                        <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Catatan</label>
                    <textarea name="catatan" rows="3"
                              placeholder="Tambahkan catatan (opsional)..."
                              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 outline-none">{{ old('catatan', $pengaduan->catatan) }}</textarea>
                </div>

                <button type="submit" class="bg-teal-600 text-white px-8 py-3 rounded-lg hover:bg-teal-700 transition font-semibold shadow-md">
                    💾 Simpan Perubahan
                </button>
            </form>
        </div>

        {{-- Riwayat --}}
        <div class="bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                    <span>📜</span> Riwayat Perubahan
                </h2>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Waktu</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-left">Catatan</th>
                            <th class="px-4 py-3 text-left">Oleh</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($pengaduan->riwayat as $r)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-600">{{ $r->created_at->format('d/m/Y H:i') }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-700 font-semibold">
                                        {{ str_replace('_', ' ', $r->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-gray-800">{{ $r->catatan ?? '-' }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $r->user->name ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-12 text-gray-500">Belum ada riwayat.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection