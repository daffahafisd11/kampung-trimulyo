@extends('layouts.dashboard-warga')

@section('title', 'Dashboard Warga')

@section('content')

    {{-- Sambutan --}}
    <div class="bg-gradient-to-r from-indigo-600 to-indigo-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">Halo, {{ $warga->nama_lengkap }} 👋</h2>
        <p class="text-indigo-100">
            @if (Auth::user()->is_bendahara)
                Bendahara {{ Auth::user()->rt->nama_rt ?? 'RT' }}
            @else
                Warga {{ Auth::user()->rt->nama_rt ?? 'RT' }}
            @endif
        </p>
    </div>

    {{-- Badge Bendahara --}}
    @if (Auth::user()->is_bendahara)
        <div class="bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 p-4 rounded-lg mb-6">
            <p class="font-bold flex items-center gap-2">
                <span>💼</span> Kamu terpilih sebagai Bendahara RT
            </p>
            <p class="text-sm mt-1">Kamu bisa kelola kas RT lewat menu <b>Kelola Kas RT</b> di sidebar.</p>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">📢</span>
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Pengaduan</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_pengaduan'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Pengaduan Saya</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">🛒</span>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">UMKM</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_umkm'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total UMKM Saya</p>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('warga.pengaduan.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 border border-transparent transition">
                <span class="text-3xl">✍️</span>
                <span class="text-sm font-medium text-gray-700 text-center">Ajukan Pengaduan</span>
            </a>
            <a href="{{ route('warga.pengaduan.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 border border-transparent transition">
                <span class="text-3xl">📋</span>
                <span class="text-sm font-medium text-gray-700 text-center">Pengaduan Saya</span>
            </a>
            <a href="{{ route('warga.umkm.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 border border-transparent transition">
                <span class="text-3xl">🛒</span>
                <span class="text-sm font-medium text-gray-700 text-center">UMKM Saya</span>
            </a>
            <a href="{{ route('warga.kas.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-indigo-50 hover:border-indigo-300 border border-transparent transition">
                <span class="text-3xl">💰</span>
                <span class="text-sm font-medium text-gray-700 text-center">Kas RT</span>
            </a>
        </div>
    </div>

@endsection