@extends('layouts.dashboard')

@section('title', 'Data RT')

@section('content')

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            <span class="flex items-center gap-2"><x-icon name="circle-check" /> {{ session('success') }}</span>
        </div>
    @endif

    <div class="dashboard-card overflow-hidden bg-white">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-lg font-bold text-gray-800">Daftar RT</h3>
            <a href="{{ route('rw.rt.create') }}" class="bg-emerald-600 text-white px-5 py-2 rounded-lg hover:bg-emerald-700 transition font-semibold text-sm">
                <span class="inline-flex items-center gap-2"><x-icon name="plus" size="h-4 w-4" /> Tambah RT</span>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama RT</th>
                        <th class="px-4 py-3 text-left">Ketua</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($rt as $i => $r)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $r->nama_rt }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $r->ketua ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('rw.rt.edit', $r->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                    <form method="POST" action="{{ route('rw.rt.destroy', $r->id) }}" onsubmit="return confirm('Hapus RT ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-12 text-gray-500">Belum ada RT.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection