@extends('layouts.dashboard')

@section('title', 'Dashboard RW')

@section('content')

    {{-- ==================== SAMBUTAN ==================== --}}
    <div class="dashboard-welcome-card bg-gradient-to-r from-emerald-600 to-emerald-800 mb-6 p-5 text-white sm:p-7">
        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-emerald-100/90">Dashboard Super Admin RW</p>
        <h2 class="text-2xl font-bold sm:text-3xl">Halo, {{ Auth::user()->name }}</h2>
        <p class="text-emerald-100">Selamat datang di Dashboard Super Admin RW</p>
    </div>

    {{-- ==================== STATISTIK ==================== --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        {{-- Total Warga --}}
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-emerald-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-500/10"><x-icon name="users" size="h-6 w-6 text-emerald-600" /></span>
                <span class="rounded-full border border-emerald-200/70 bg-emerald-50/75 px-3 py-1 text-xs font-semibold text-emerald-700">Warga</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_warga'] }}</p><p class="mt-1 text-sm text-gray-600">Total Warga Terdaftar</p></div>
        </div>

        {{-- Total RT --}}
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-teal-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-teal-500/10"><x-icon name="building" size="h-6 w-6 text-teal-600" /></span>
                <span class="rounded-full border border-teal-200/70 bg-teal-50/75 px-3 py-1 text-xs font-semibold text-teal-700">RT</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_rt'] }}</p><p class="mt-1 text-sm text-gray-600">Total RT</p></div>
        </div>

        {{-- Total UMKM --}}
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-lime-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-lime-500/10"><x-icon name="store" size="h-6 w-6 text-lime-600" /></span>
                <span class="rounded-full border border-lime-200/70 bg-lime-50/75 px-3 py-1 text-xs font-semibold text-lime-700">UMKM</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_umkm'] }}</p><p class="mt-1 text-sm text-gray-600">Total UMKM</p></div>
        </div>

        {{-- Total Pengaduan --}}
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-orange-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-orange-500/10"><x-icon name="megaphone" size="h-6 w-6 text-orange-600" /></span>
                <span class="rounded-full border border-orange-200/70 bg-orange-50/75 px-3 py-1 text-xs font-semibold text-orange-700">Pengaduan</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_pengaduan'] }}</p><p class="mt-1 text-sm text-gray-600">Total Pengaduan</p></div>
        </div>
    </div>

    {{-- ==================== MENU CEPAT ==================== --}}
    <div class="dashboard-card bg-white p-5 sm:p-6">
        <h3 class="mb-4 text-lg font-bold text-gray-800 sm:text-xl">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('rw.warga.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="users" size="h-8 w-8 text-emerald-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Kelola Warga</span>
            </a>
            <a href="{{ route('rw.rt.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="building" size="h-8 w-8 text-emerald-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Kelola RT</span>
            </a>
            <a href="{{ route('rw.informasi.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="newspaper" size="h-8 w-8 text-emerald-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Informasi</span>
            </a>
            <a href="{{ route('rw.kegiatan.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="calendar" size="h-8 w-8 text-emerald-700" />
                <span class="text-sm font-medium text-gray-700 text-center">Kegiatan</span>
            </a>
        </div>
    </div>

@endsection