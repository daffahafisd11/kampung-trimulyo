@extends('layouts.dashboard')

@section('title', 'Edit Kegiatan')

@section('content')

    <div class="max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('rw.kegiatan.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke Kegiatan</a>
        </div>

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

        <form method="POST" action="{{ route('rw.kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span>🎉</span> Data Kegiatan
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_kegiatan" value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $kegiatan->tanggal?->format('Y-m-d')) }}" required
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai <span class="text-red-500">*</span></label>
                            <input type="time" name="waktu_mulai" value="{{ old('waktu_mulai', $kegiatan->waktu_mulai) }}" required
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai <span class="text-red-500">*</span></label>
                            <input type="time" name="waktu_selesai" value="{{ old('waktu_selesai', $kegiatan->waktu_selesai) }}" required
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi <span class="text-red-500">*</span></label>
                        <input type="text" name="lokasi" value="{{ old('lokasi', $kegiatan->lokasi) }}" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span class="text-red-500">*</span></label>
                        <textarea name="deskripsi" rows="4" required
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status <span class="text-red-500">*</span></label>
                        <select name="status" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                            <option value="aktif" {{ old('status', $kegiatan->status) == 'aktif' ? 'selected' : '' }}>🟢 Aktif</option>
                            <option value="selesai" {{ old('status', $kegiatan->status) == 'selesai' ? 'selected' : '' }}>✅ Selesai</option>
                            <option value="dibatalkan" {{ old('status', $kegiatan->status) == 'dibatalkan' ? 'selected' : '' }}>❌ Dibatalkan</option>
                        </select>
                    </div>

                    @if ($kegiatan->gambar)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="Gambar" class="w-48 rounded-lg shadow-md border border-gray-200">
                        </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            {{ $kegiatan->gambar ? 'Ganti Gambar (opsional)' : 'Gambar (opsional)' }}
                        </label>
                        <input type="file" name="gambar" accept="image/*"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-emerald-50 file:text-emerald-700 file:font-medium hover:file:bg-emerald-100">
                        <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin ganti gambar.</p>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700 transition font-semibold shadow-md">
                    💾 Update
                </button>
                <a href="{{ route('rw.kegiatan.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection