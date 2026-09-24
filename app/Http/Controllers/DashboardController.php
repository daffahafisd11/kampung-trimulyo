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
        $user = Auth::user();
        $rt = $user->warga?->rt; // Ambil RT dari warga yang terkait

        // Fallback: cari RT berdasarkan nama user atau relasi lain
        // Untuk sementara, RT bisa didapat dari data warga
        // Di production, sebaiknya tambahkan relasi user -> rt langsung

        // Sementara: ambil RT pertama jika tidak ada
        if (!$rt) {
            $rt = Rt::first();
        }

        if (!$rt) {
            abort(404, 'Data RT tidak ditemukan.');
        }

        $stats = [
            'total_warga' => Warga::where('rt_id', $rt->id)->count(),
            'pengaduan_masuk' => Pengaduan::where('rt_id', $rt->id)->count(),
            'pengaduan_diproses' => Pengaduan::where('rt_id', $rt->id)->where('status', 'diproses')->count(),
            'pengaduan_selesai' => Pengaduan::where('rt_id', $rt->id)->where('status', 'selesai')->count(),
            'umkm_menunggu' => Umkm::whereHas('warga', function ($q) use ($rt) {
                $q->where('rt_id', $rt->id);
            })->where('status', 'menunggu_verifikasi')->count(),
        ];

        return view('dashboard.rt', compact('stats', 'rt'));
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