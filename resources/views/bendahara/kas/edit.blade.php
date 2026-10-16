@extends('layouts.dashboard-bendahara')

@section('title', 'Edit Transaksi')

@section('content')

    <div class="max-w-2xl">
        <div class="mb-6">
            <a href="{{ route('bendahara.kas.index') }}" class="text-amber-600 hover:text-amber-800 font-medium text-sm">← Kembali ke Kas RT</a>
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

        <form method="POST" action="{{ route('bendahara.kas.update', $kas->id) }}" class="space-y-6">
            @csrf @method('PUT')

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span>✏️</span> Edit Transaksi
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="tanggal" value="{{ old('tanggal', $kas->tanggal->format('Y-m-d')) }}" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Transaksi <span class="text-red-500">*</span></label>
                        <select name="jenis" required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                            <option value="masuk" {{ old('jenis', $kas->jenis) == 'masuk' ? 'selected' : '' }}>📥 Uang Masuk</option>
                            <option value="keluar" {{ old('jenis', $kas->jenis) == 'keluar' ? 'selected' : '' }}>📤 Uang Keluar</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                        <input type="text" name="kategori" value="{{ old('kategori', $kas->kategori) }}" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan <span class="text-red-500">*</span></label>
                        <textarea name="keterangan" rows="3" required
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">{{ old('keterangan', $kas->keterangan) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah (Rp) <span class="text-red-500">*</span></label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', $kas->jumlah) }}" min="1" step="any" required
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 outline-none">
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-amber-600 text-white px-8 py-3 rounded-lg hover:bg-amber-700 transition font-semibold shadow-md">
                    💾 Update Transaksi
                </button>
                <a href="{{ route('bendahara.kas.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection