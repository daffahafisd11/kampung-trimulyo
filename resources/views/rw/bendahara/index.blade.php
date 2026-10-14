@extends('layouts.dashboard')

@section('title', 'Kelola Bendahara')

@section('content')

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Bendahara per RT</h3>
            <p class="text-sm text-gray-500 mt-1">Tunjuk warga sebagai bendahara di setiap RT</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">RT</th>
                        <th class="px-4 py-3 text-left">Bendahara</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($rt as $i => $r)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $r->nama_rt }}</td>
                            <td class="px-4 py-3">
                                @if ($r->bendahara)
                                    <span class="text-gray-800 font-medium">{{ $r->bendahara->name }}</span>
                                @else
                                    <span class="text-gray-400 italic">Belum ditunjuk</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-gray-600">{{ $r->bendahara->email ?? '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('rw.bendahara.edit', $r->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">
                                    {{ $r->bendahara ? 'Ganti' : 'Tunjuk' }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-12 text-gray-500">Belum ada RT.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection