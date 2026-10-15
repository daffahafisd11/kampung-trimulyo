@extends('layouts.dashboard')

@section('title', 'Data Warga')

@section('content')

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Filter & Search --}}
    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <form method="GET" action="{{ route('rw.warga.index') }}" class="flex flex-wrap gap-3">
            <input type="text" name="search" placeholder="Cari nama / NIK / email..." value="{{ request('search') }}"
                   class="flex-1 min-w-[200px] px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
            <select name="rt_id" class="px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">
                <option value="">Semua RT</option>
                @foreach ($rt as $r)
                    <option value="{{ $r->id }}" {{ request('rt_id') == $r->id ? 'selected' : '' }}>
                        {{ $r->nama_rt }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="bg-emerald-600 text-white px-6 py-2.5 rounded-lg hover:bg-emerald-700 transition font-semibold">
                🔍 Cari
            </button>
            <a href="{{ route('rw.warga.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2.5 rounded-lg hover:bg-gray-300 transition font-semibold">
                Reset
            </a>
        </form>
    </div>

    {{-- Tabel --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar Warga</h3>
            <a href="{{ route('rw.warga.create') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-lg hover:bg-emerald-700 transition font-semibold text-sm">
                + Tambah Warga
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">NIK</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">JK</th>
                        <th class="px-4 py-3 text-left">RT</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($warga as $i => $w)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $warga->firstItem() + $i }}</td>
                            <td class="px-4 py-3 font-mono text-xs">{{ $w->nik }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $w->nama_lengkap }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $w->user->email }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 rounded-full text-xs {{ $w->jenis_kelamin == 'L' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700' }}">
                                    {{ $w->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="px-4 py-3">{{ $w->rt->nama_rt ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('rw.warga.edit', $w->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('rw.warga.destroy', $w->id) }}" onsubmit="return confirm('Hapus warga ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-12 text-gray-500">Tidak ada data warga.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $warga->links() }}
        </div>
    </div>

@endsection