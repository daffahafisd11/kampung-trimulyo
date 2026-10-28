@extends('layouts.dashboard-rt')

@section('title', 'Dashboard RT')

@section('content')

    <div class="dashboard-welcome-card bg-gradient-to-r from-teal-600 to-teal-800 mb-6 p-5 text-white sm:p-7">
        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-teal-100/90">Dashboard Admin RT</p>
        <h2 class="text-2xl font-bold sm:text-3xl">Halo, {{ Auth::user()->name }}</h2>
        <p class="text-teal-100">Dashboard Admin <b>{{ $rt->nama_rt ?? '-' }}</b></p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-teal-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-500/10"><x-icon name="users" size="h-6 w-6 text-teal-600" /></span>
                <span class="rounded-full border border-teal-200/70 bg-teal-50/75 px-3 py-1 text-xs font-semibold text-teal-700">Warga</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_warga'] }}</p><p class="mt-1 text-sm text-gray-600">Total Warga</p></div>
        </div>

        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-orange-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-orange-500/10"><x-icon name="megaphone" size="h-6 w-6 text-orange-600" /></span>
                <span class="rounded-full border border-orange-200/70 bg-orange-50/75 px-3 py-1 text-xs font-semibold text-orange-700">Pengaduan</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['pengaduan_masuk'] }}</p><p class="mt-1 text-sm text-gray-600">Pengaduan Masuk</p></div>
        </div>

        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-yellow-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-yellow-500/10"><x-icon name="clock" size="h-6 w-6 text-yellow-600" /></span>
                <span class="rounded-full border border-yellow-200/70 bg-yellow-50/75 px-3 py-1 text-xs font-semibold text-yellow-700">Diproses</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['pengaduan_diproses'] }}</p><p class="mt-1 text-sm text-gray-600">Pengaduan Diproses</p></div>
        </div>

        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-purple-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-purple-500/10"><x-icon name="store" size="h-6 w-6 text-purple-600" /></span>
                <span class="rounded-full border border-purple-200/70 bg-purple-50/75 px-3 py-1 text-xs font-semibold text-purple-700">UMKM</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['umkm_menunggu'] }}</p><p class="mt-1 text-sm text-gray-600">UMKM Menunggu Verifikasi</p></div>
        </div>
    </div>

    <div class="dashboard-card bg-white mb-6 p-5 sm:p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
            <x-icon name="wallet" size="h-5 w-5 text-teal-700" /> Ringkasan Kas RT
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="dashboard-summary-tile rounded-2xl bg-green-50/60 p-4">
                <p class="text-sm text-gray-600 mb-1">Total Masuk</p>
                <p class="text-lg font-bold text-green-700">Rp {{ number_format($kas['total_masuk'], 0, ',', '.') }}</p>
            </div>
            <div class="dashboard-summary-tile rounded-2xl bg-red-50/60 p-4">
                <p class="text-sm text-gray-600 mb-1">Total Keluar</p>
                <p class="text-lg font-bold text-red-700">Rp {{ number_format($kas['total_keluar'], 0, ',', '.') }}</p>
            </div>
            <div class="dashboard-summary-tile rounded-2xl bg-teal-50/60 p-4">
                <p class="text-sm text-gray-600 mb-1">Saldo</p>
                <p class="text-lg font-bold text-teal-700">Rp {{ number_format($kas['saldo'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    <div class="dashboard-card bg-white p-5 sm:p-6">
        <h3 class="mb-4 text-lg font-bold text-gray-800 sm:text-xl">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('rt.warga.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="users" size="h-8 w-8 text-teal-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Data Warga</span>
            </a>
            <a href="{{ route('rt.kas.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="wallet" size="h-8 w-8 text-teal-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Kas RT</span>
            </a>
            <a href="{{ route('rt.pengaduan.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="megaphone" size="h-8 w-8 text-teal-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Pengaduan</span>
            </a>
            <a href="{{ route('rt.umkm.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="store" size="h-8 w-8 text-teal-700" />
                <span class="text-sm font-medium text-gray-700 text-center">UMKM</span>
            </a>
        </div>
    </div>

@endsection