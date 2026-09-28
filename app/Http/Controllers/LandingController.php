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
        // Ambil parameter search terpisah
        $searchInformasi = $request->input('search_informasi');
        $searchKegiatan  = $request->input('search_kegiatan');
        $searchUmkm      = $request->input('search_umkm');

        // Info kampung
        $rw = Rw::first();
        $rt = Rt::orderBy('nama_rt')->get();

        // ==================== INFORMASI ====================
        $informasiQuery = Informasi::with('user')
            ->where('status', 'dipublikasikan');

        if ($searchInformasi) {
            $informasiQuery->where(function ($q) use ($searchInformasi) {
                $q->where('judul', 'like', "%{$searchInformasi}%")
                    ->orWhere('isi', 'like', "%{$searchInformasi}%");
            });
        }

        $informasi = $informasiQuery->latest()->get();

        // ==================== KEGIATAN ====================
        $kegiatanQuery = Kegiatan::with('user')
            ->where('status', 'aktif');

        if ($searchKegiatan) {
            $kegiatanQuery->where(function ($q) use ($searchKegiatan) {
                $q->where('nama_kegiatan', 'like', "%{$searchKegiatan}%")
                    ->orWhere('deskripsi', 'like', "%{$searchKegiatan}%")
                    ->orWhere('lokasi', 'like', "%{$searchKegiatan}%");
            });
        }

        $kegiatan = $kegiatanQuery->orderBy('tanggal', 'desc')->get();

        // ==================== UMKM ====================
        $umkmQuery = Umkm::with(['kategori', 'warga.rt'])
            ->where('status', 'disetujui');

        if ($searchUmkm) {
            $umkmQuery->where(function ($q) use ($searchUmkm) {
                $q->where('nama_usaha', 'like', "%{$searchUmkm}%")
                    ->orWhere('deskripsi', 'like', "%{$searchUmkm}%")
                    ->orWhere('alamat', 'like', "%{$searchUmkm}%");
            });
        }

        $umkm = $umkmQuery->latest()->get();

        return view('landing.index', compact(
            'rw',
            'rt',
            'informasi',
            'kegiatan',
            'umkm',
            'searchInformasi',
            'searchKegiatan',
            'searchUmkm'
        ));
    }
}