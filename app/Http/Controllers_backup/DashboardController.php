<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Warga;
use App\Models\Rt;
use App\Models\Pengaduan;
use App\Models\Umkm;

class DashboardController extends Controller
{
    // Dashboard RW
    public function rw()
    {
        $stats = [
            'total_warga' => Warga::count(),
            'total_rt' => Rt::count(),
            'total_umkm' => Umkm::count(),
            'total_pengaduan' => Pengaduan::count(),
            'pengaduan_selesai' => Pengaduan::where('status', 'selesai')->count(),
            'pengaduan_diproses' => Pengaduan::where('status', 'diproses')->count(),
            'pengaduan_menunggu' => Pengaduan::where('status', 'menunggu_verifikasi')->count(),
        ];

        return view('dashboard.rw', compact('stats'));
    }

    // Dashboard RT
    public function rt()
    {
        $rt = Auth::user()->rt;

        if (!$rt) {
            abort(404, 'Data RT tidak ditemukan untuk akun ini.');
        }

        // Statistik pengaduan
        $stats = [
            'total_warga'        => \App\Models\Warga::where('rt_id', $rt->id)->count(),
            'pengaduan_masuk'    => \App\Models\Pengaduan::where('rt_id', $rt->id)->count(),
            'pengaduan_diproses' => \App\Models\Pengaduan::where('rt_id', $rt->id)->where('status', 'diproses')->count(),
            'pengaduan_selesai'  => \App\Models\Pengaduan::where('rt_id', $rt->id)->where('status', 'selesai')->count(),
            'umkm_menunggu'      => \App\Models\Umkm::whereHas('warga', fn($q) => $q->where('rt_id', $rt->id))
                                        ->where('status', 'menunggu_verifikasi')->count(),
        ];

        // Statistik kas
        $totalMasuk  = \App\Models\KasRt::where('rt_id', $rt->id)->where('jenis', 'masuk')->sum('jumlah');
        $totalKeluar = \App\Models\KasRt::where('rt_id', $rt->id)->where('jenis', 'keluar')->sum('jumlah');

        $kas = [
            'total_masuk'  => $totalMasuk,
            'total_keluar' => $totalKeluar,
            'saldo'        => $totalMasuk - $totalKeluar,
        ];

        return view('dashboard.rt', compact('stats', 'rt', 'kas'));
    }

    // Dashboard Warga
    public function warga()
    {
        $user = Auth::user();
        $warga = $user->warga;

        if (!$warga) {
            abort(404, 'Data warga tidak ditemukan.');
        }

        $stats = [
            'total_pengaduan' => Pengaduan::where('warga_id', $warga->id)->count(),
            'pengaduan_diproses' => Pengaduan::where('warga_id', $warga->id)->where('status', 'diproses')->count(),
            'pengaduan_selesai' => Pengaduan::where('warga_id', $warga->id)->where('status', 'selesai')->count(),
            'total_umkm' => Umkm::where('warga_id', $warga->id)->count(),
        ];

        return view('dashboard.warga', compact('stats', 'warga'));
    }
}