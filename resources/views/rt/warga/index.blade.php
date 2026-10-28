@extends('layouts.dashboard-rt')

@section('title', 'Data Warga')

@section('content')
    <div class="mx-auto w-full max-w-7xl space-y-5">
        @if (session('success'))
            <div class="dashboard-notice p-4">
                <x-icon name="circle-check" />
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="dashboard-notice items-start border-l-red-300 p-4">
                <x-icon name="alert" />
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <section class="dashboard-welcome-card flex flex-col gap-5 p-5 text-white sm:flex-row sm:items-center sm:justify-between sm:p-6">
            <div>
                <h2 class="mb-1 flex items-center gap-2 text-2xl font-bold">
                    <x-icon name="users" size="h-6 w-6" />
                    Data Warga
                </h2>
                <p class="text-sm text-white/70">Daftar warga yang terdaftar di {{ $rt->nama_rt }}.</p>
            </div>
            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-white/15 bg-white/5 px-4 py-3">
                <x-icon name="users" />
                <span class="text-sm text-white/70">Total warga</span>
                <span class="font-semibold text-white">{{ $warga->total() }}</span>
            </div>
        </section>

        <section class="dashboard-card p-4 sm:p-5">
            <form method="GET" action="{{ route('rt.warga.index') }}" class="flex flex-col gap-3 sm:flex-row">
                <label for="search-warga" class="sr-only">Cari nama atau NIK warga</label>
                <input
                    id="search-warga"
                    type="search"
                    name="search"
                    placeholder="Cari nama atau NIK warga..."
                    value="{{ request('search') }}"
                    class="min-h-12 min-w-0 flex-1 rounded-xl border border-white/15 bg-black/20 px-4 text-sm text-white outline-none placeholder:text-white/40 focus:border-teal-200/50 focus:ring-2 focus:ring-teal-200/20"
                >
                <div class="flex flex-col gap-3 sm:flex-row">
                    <button type="submit" class="inline-flex min-h-12 items-center justify-center gap-2 rounded-xl border border-teal-200/20 bg-teal-200/15 px-5 font-semibold text-teal-50 transition hover:bg-teal-200/25">
                        <x-icon name="search" size="h-4 w-4" />
                        Cari
                    </button>
                    @if (request()->filled('search'))
                        <a href="{{ route('rt.warga.index') }}" class="inline-flex min-h-12 items-center justify-center rounded-xl border border-white/15 bg-white/5 px-5 font-semibold text-white/75 transition hover:bg-white/10">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </section>

        <section class="dashboard-card overflow-hidden">
            <div class="flex flex-col gap-1 border-b border-white/10 px-4 py-4 sm:px-6">
                <h3 class="font-semibold text-white">Daftar warga {{ $rt->nama_rt }}</h3>
                <p class="text-sm text-white/55">Menampilkan {{ $warga->count() }} dari {{ $warga->total() }} warga.</p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[760px] text-left text-sm">
                    <thead class="bg-white/5 text-xs uppercase tracking-wide text-white/55">
                        <tr>
                            <th scope="col" class="px-4 py-3 font-medium sm:px-6">No.</th>
                            <th scope="col" class="px-4 py-3 font-medium">NIK</th>
                            <th scope="col" class="px-4 py-3 font-medium">Nama lengkap</th>
                            <th scope="col" class="px-4 py-3 font-medium">Email</th>
                            <th scope="col" class="px-4 py-3 font-medium">Jenis kelamin</th>
                            <th scope="col" class="px-4 py-3 font-medium">No. HP</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10 text-white/80">
                        @forelse ($warga as $i => $w)
                            <tr class="transition hover:bg-white/[0.04]">
                                <td class="whitespace-nowrap px-4 py-4 text-white/50 sm:px-6">{{ $warga->firstItem() + $i }}</td>
                                <td class="whitespace-nowrap px-4 py-4 font-mono text-xs">{{ $w->nik }}</td>
                                <td class="px-4 py-4 font-medium text-white">{{ $w->nama_lengkap }}</td>
                                <td class="px-4 py-4">{{ $w->user?->email ?? '-' }}</td>
                                <td class="px-4 py-4">
                                    <span class="inline-flex rounded-full border border-white/10 bg-white/5 px-2.5 py-1 text-xs">
                                        {{ $w->jenis_kelamin === 'L' ? 'Laki-laki' : ($w->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-4">{{ $w->no_hp ?: '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center text-white/60">
                                    {{ request()->filled('search') ? 'Warga tidak ditemukan.' : 'Belum ada data warga.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($warga->hasPages())
                <div class="border-t border-white/10 px-4 py-4 sm:px-6">
                    {{ $warga->links() }}
                </div>
            @endif
        </section>
    </div>
@endsection
