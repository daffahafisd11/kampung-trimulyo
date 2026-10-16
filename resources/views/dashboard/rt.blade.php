@extends('layouts.dashboard-rt')

@section('title', 'Dashboard RT')

@section('content')

    <div class="bg-gradient-to-r from-teal-600 to-teal-800 rounded-2xl shadow-lg p-6 mb-6 text-white">
        <h2 class="text-2xl font-bold mb-1">Halo, {{ Auth::user()->name }} 👋</h2>
        <p class="text-teal-100">Dashboard Admin <b>{{ $rt->nama_rt ?? '-' }}</b></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-teal-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">👥</span>
                <span class="text-xs font-semibold text-teal-600 bg-teal-50 px-2 py-1 rounded-full">Warga</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_warga'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Total Warga</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-orange-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">📢</span>
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Pengaduan</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['pengaduan_masuk'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Pengaduan Masuk</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-yellow-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">⏳</span>
                <span class="text-xs font-semibold text-yellow-600 bg-yellow-50 px-2 py-1 rounded-full">Diproses</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['pengaduan_diproses'] }}</p>
            <p class="text-sm text-gray-500 mt-1">Pengaduan Diproses</p>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-purple-500 hover:shadow-xl transition">
            <div class="flex items-center justify-between mb-2">
                <span class="text-3xl">🛒</span>
                <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-1 rounded-full">UMKM</span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['umkm_menunggu'] }}</p>
            <p class="text-sm text-gray-500 mt-1">UMKM Menunggu Verifikasi</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
            <span>💰</span> Ringkasan Kas RT
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-green-50 rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">Total Masuk</p>
                <p class="text-lg font-bold text-green-700">Rp {{ number_format($kas['total_masuk'], 0, ',', '.') }}</p>
            </div>
            <div class="bg-red-50 rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">Total Keluar</p>
                <p class="text-lg font-bold text-red-700">Rp {{ number_format($kas['total_keluar'], 0, ',', '.') }}</p>
            </div>
            <div class="bg-teal-50 rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">Saldo</p>
                <p class="text-lg font-bold text-teal-700">Rp {{ number_format($kas['saldo'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('rt.warga.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-teal-50 hover:border-teal-300 border border-transparent transition">
                <span class="text-3xl">👥</span>
                <span class="text-sm font-medium text-gray-700 text-center">Data Warga</span>
            </a>
            <a href="{{ route('rt.kas.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-teal-50 hover:border-teal-300 border border-transparent transition">
                <span class="text-3xl">💰</span>
                <span class="text-sm font-medium text-gray-700 text-center">Kas RT</span>
            </a>
            <a href="{{ route('rt.pengaduan.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-teal-50 hover:border-teal-300 border border-transparent transition">
                <span class="text-3xl">📢</span>
                <span class="text-sm font-medium text-gray-700 text-center">Pengaduan</span>
            </a>
            <a href="{{ route('rt.umkm.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 hover:bg-teal-50 hover:border-teal-300 border border-transparent transition">
                <span class="text-3xl">🛒</span>
                <span class="text-sm font-medium text-gray-700 text-center">UMKM</span>
            </a>
        </div>
    </div>

@endsection