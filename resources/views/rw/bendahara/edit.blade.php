@extends('layouts.dashboard')

@section('title', 'Tunjuk Bendahara')

@section('content')

    <div class="max-w-2xl">
        <div class="mb-6">
            <a href="{{ route('rw.bendahara.index') }}" class="text-emerald-600 hover:text-emerald-800 font-medium text-sm">← Kembali ke Kelola Bendahara</a>
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

        <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-800 p-4 rounded-lg mb-6">
            <p class="font-bold mb-1">💡 Info</p>
            <p class="text-sm">
                Kalau RT ini sudah punya bendahara, memilih warga baru akan <b>mengganti</b> bendahara lama secara otomatis.
            </p>
        </div>

        <form method="POST" action="{{ route('rw.bendahara.update', $rt->id) }}" class="space-y-6">
            @csrf @method('PUT')

            <div class="bg-white rounded-2xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span>💼</span> Tunjuk Bendahara {{ $rt->nama_rt }}
                </h3>

                {{-- Info RT --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">RT</p>
                        <p class="text-lg font-bold text-gray-800">{{ $rt->nama_rt }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-sm text-gray-500 mb-1">Bendahara Sekarang</p>
                        <p class="text-lg font-bold text-gray-800">
                            {{ $rt->bendahara->name ?? 'Belum ada' }}
                        </p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Pilih Warga sebagai Bendahara <span class="text-red-500">*</span>
                    </label>
                    <select name="user_id" required
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                        <option value="">-- Pilih Warga --</option>
                        @foreach ($warga as $w)
                            <option value="{{ $w->id }}" {{ $rt->bendahara && $rt->bendahara->id == $w->id ? 'selected' : '' }}>
                                {{ $w->name }} ({{ $w->email }})
                            </option>
                        @endforeach
                    </select>

                    @if ($warga->isEmpty())
                        <p class="text-sm text-red-500 mt-2">
                            ⚠️ Belum ada warga terdaftar di {{ $rt->nama_rt }}. Tambah warga dulu di menu Data Warga.
                        </p>
                    @endif
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-emerald-600 text-white px-8 py-3 rounded-lg hover:bg-emerald-700 transition font-semibold shadow-md"
                        {{ $warga->isEmpty() ? 'disabled' : '' }}>
                    💾 Simpan
                </button>
                <a href="{{ route('rw.bendahara.index') }}" class="bg-gray-200 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-300 transition font-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection