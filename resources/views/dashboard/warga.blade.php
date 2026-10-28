@extends('layouts.dashboard-warga')

@section('title', 'Dashboard Warga')

@section('content')

    {{-- Sambutan --}}
    <div class="dashboard-welcome-card bg-gradient-to-r from-indigo-600 to-indigo-800 mb-6 p-5 text-white sm:p-7">
        <p class="mb-2 text-xs font-semibold uppercase tracking-[0.18em] text-indigo-100/90">Ringkasan akun</p>
        <h2 class="text-2xl font-bold sm:text-3xl">Halo, {{ $warga->nama_lengkap }}</h2>
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
        <div class="dashboard-card mb-6 border-l-4 border-yellow-500 bg-yellow-50/70 p-4 text-yellow-800 sm:p-5">
            <p class="font-bold flex items-center gap-2">
                <x-icon name="briefcase" /> Kamu terpilih sebagai Bendahara RT
            </p>
            <p class="text-sm mt-1">Kamu bisa kelola kas RT lewat menu <b>Kelola Kas RT</b> di sidebar.</p>
        </div>
    @endif

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-orange-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-orange-500/10"><x-icon name="megaphone" size="h-6 w-6 text-orange-600" /></span>
                <span class="rounded-full border border-orange-200/70 bg-orange-50/75 px-3 py-1 text-xs font-semibold text-orange-700">Pengaduan</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_pengaduan'] }}</p><p class="mt-1 text-sm text-gray-600">Total Pengaduan Saya</p></div>
        </div>

        <div class="dashboard-card dashboard-stat-card bg-white border-l-4 border-green-500">
            <div class="flex items-center justify-between gap-3">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-green-500/10"><x-icon name="store" size="h-6 w-6 text-green-600" /></span>
                <span class="rounded-full border border-green-200/70 bg-green-50/75 px-3 py-1 text-xs font-semibold text-green-700">UMKM</span>
            </div>
            <div><p class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $stats['total_umkm'] }}</p><p class="mt-1 text-sm text-gray-600">Total UMKM Saya</p></div>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="dashboard-card bg-white p-5 sm:p-6">
        <h3 class="mb-4 text-lg font-bold text-gray-800 sm:text-xl">Menu Cepat</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <a href="{{ route('warga.pengaduan.create') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="edit" size="h-8 w-8 text-indigo-600" />
                <span class="text-sm font-medium text-gray-700 text-center">Ajukan Pengaduan</span>
            </a>
            <a href="{{ route('warga.pengaduan.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="clipboard" size="h-8 w-8 text-indigo-600" />
                <span class="text-sm font-medium text-gray-700 text-center">Pengaduan Saya</span>
            </a>
            <a href="{{ route('warga.umkm.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="store" size="h-8 w-8 text-indigo-600" />
                <span class="text-sm font-medium text-gray-700 text-center">UMKM Saya</span>
            </a>
            <a href="{{ route('warga.kas.index') }}" class="dashboard-quick-link flex flex-col items-center gap-3 p-4">
                <x-icon name="wallet" size="h-8 w-8 text-indigo-600" />
                <span class="text-sm font-medium text-gray-700 text-center">Kas RT</span>
            </a>
        </div>
    </div>

@endsection