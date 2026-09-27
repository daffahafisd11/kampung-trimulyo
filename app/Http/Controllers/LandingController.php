<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Rt;
use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Umkm;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $rw = Rw::first();
        $rt = Rt::orderBy('nama_rt')->get();
        
        $informasiQuery = Informasi::with('user')
            ->where('status', 'dipublikasikan');

        $kegiatanQuery = Kegiatan::with('user')
            ->where('status', 'aktif');

        $umkmQuery = Umkm::with(['kategori', 'warga.rt'])
            ->where('status', 'disetujui');

        if ($search) {
            $informasiQuery->where(function ($q) use ($search) {
                $q  ->where('judul', 'like', "%{$search}%")
                    ->orWhere('is', 'like', "%{$search}%");
            });

            $kegiatanQuery->where(function ($q) use ($search) {
                $q  ->where('nama_kegiatan', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('lokasi', 'like', "%{$search}%");
            });

            $umkmQuery->where(function ($q) use ($search) {
                $q  ->where('nama_usaha', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('alamat', 'like', "%{$search}%");
            });
        }

        $informasi = $informasiQuery->latest()->get();
        $kegiatan = $kegiatanQuery->orderBy('tanggal', 'desc')->get();
        $umkm = $umkmQuery->latest()->get();

        return view('landing.index', compact(
            'rw', 'rt', 'informasi', 'kegiatan', 'umkm', 'search'
        ));
    }
}
