@extends('layouts.dashboard')

@section('title', 'Tambah Kategori Pengaduan')

@section('content')

    <div class="max-w-2xl">
        <div class="mb-6">
            <a href="{{ route('rw.kategori-pengaduan.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke Kategori Pengaduan</a>
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

        <form method="POST" action="{{ route('rw.kategori-pengaduan.store') }}" class="space-y-6">
            @csrf

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span>📂</span> Data Kategori
                </h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Kategori <span class="text-red-500">*</span></label>
                        <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" required
                               placeholder="Contoh: Infrastruktur"
                               class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="deskripsi" rows="4"
                                  placeholder="Penjelasan singkat kategori ini..."
                                  class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700 transition font-semibold shadow-md">
                    💾 Simpan
                </button>
                <a href="{{ route('rw.kategori-pengaduan.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection