@extends('layouts.dashboard')

@section('title', 'Dashboard RW')

@section('content')

    {{-- ==================== SAMBUTAN ==================== --}}
    <div class="bg-gradient-to-r from-emerald-600 to-emerald-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">Halo, {{ Auth::user()->name }} 👋</h2>
        <p class="text-emerald-100">Selamat datang di Dashboard Super Admin RW</p>
    </div>

    {{-- ==================== STATISTIK ==================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        {{-- Total Warga --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-emerald-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">👥</span>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full">Warga</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_warga'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Warga Terdaftar</p>
        </div>

        {{-- Total RT --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-teal-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">🏘️</span>
                <span class="text-xs font-semibold text-teal-600 bg-teal-50 px-2 py-1 rounded-full">RT</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_rt'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total RT</p>
        </div>

        {{-- Total UMKM --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-lime-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">🛒</span>
                <span class="text-xs font-semibold text-lime-600 bg-lime-50 px-2 py-1 rounded-full">UMKM</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_umkm'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total UMKM</p>
        </div>

        {{-- Total Pengaduan --}}
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">📢</span>
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Pengaduan</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_pengaduan'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Pengaduan</p>
        </div>
    </div>

    {{-- ==================== MENU CEPAT ==================== --}}
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('rw.warga.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 border border-transparent transition">
                <span class="text-3xl">👥</span>
                <span class="text-sm font-medium text-gray-700 text-center">Kelola Warga</span>
            </a>
            <a href="{{ route('rw.rt.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 border border-transparent transition">
                <span class="text-3xl">🏘️</span>
                <span class="text-sm font-medium text-gray-700 text-center">Kelola RT</span>
            </a>
            <a href="{{ route('rw.informasi.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 border border-transparent transition">
                <span class="text-3xl">📰</span>
                <span class="text-sm font-medium text-gray-700 text-center">Informasi</span>
            </a>
            <a href="{{ route('rw.kegiatan.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-emerald-50 hover:border-emerald-300 border border-transparent transition">
                <span class="text-3xl">🎉</span>
                <span class="text-sm font-medium text-gray-700 text-center">Kegiatan</span>
            </a>
        </div>
    </div>

@endsection