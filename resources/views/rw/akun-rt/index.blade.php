@extends('layouts.dashboard')

@section('title', 'Akun RT')

@section('content')

    @if (session('success'))
        <div class="bg-emerald-100 border-l-4 border-emerald-600 text-emerald-800 p-4 rounded-lg mb-6">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-md overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-800">Daftar Akun RT</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">No</th>
                        <th class="px-4 py-3 text-left">Nama</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">RT</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($akunRt as $i => $a)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $i + 1 }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $a->name }}</td>
                            <td class="px-4 py-3 text-gray-600">{{ $a->email }}</td>
                            <td class="px-4 py-3">{{ $a->rt->nama_rt ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('rw.akun-rt.edit', $a->id) }}" class="text-emerald-600 hover:text-emerald-800 font-medium">Edit</a>
                                    <a href="{{ route('rw.akun-rt.reset-password', $a->id) }}" class="text-orange-600 hover:text-orange-800 font-medium">Reset Password</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center py-12 text-gray-500">Belum ada akun RT.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection