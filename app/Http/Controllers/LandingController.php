<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Rt;
use App\Models\Warga;
use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $rw = Rw::first();
        $rt = Rt::orderBy('nama_rt')->get();
        $isLoggedIn = Auth::check();

        $searchInformasi = $request->input('search_informasi');
        $searchKegiatan  = $request->input('search_kegiatan');
        $searchUmkm      = $request->input('search_umkm');

        // ============ UMKM — SELALU DIAMBIL ============
        $umkmQuery = Umkm::with(['kategori', 'warga.rt'])
            ->where('status', 'disetujui');

        if ($searchUmkm) {
            $umkmQuery->where(function ($q) use ($searchUmkm) {
                $q->where('nama_usaha', 'like', "%{$searchUmkm}%")
                  ->orWhere('deskripsi', 'like', "%{$searchUmkm}%")
                  ->orWhere('alamat', 'like', "%{$searchUmkm}%");
            });
        }

        $umkm = $umkmQuery->latest()->limit(8)->get();

        // ============ INFORMASI & KEGIATAN — HANYA KALAU LOGIN ============
        $informasi = collect();
        $kegiatan  = collect();

        if ($isLoggedIn) {
            // Informasi
            $informasiQuery = Informasi::with('user')
                ->where('status', 'dipublikasikan');

            if ($searchInformasi) {
                $informasiQuery->where(function ($q) use ($searchInformasi) {
                    $q->where('judul', 'like', "%{$searchInformasi}%")
                      ->orWhere('isi', 'like', "%{$searchInformasi}%");
                });
            }

            $informasi = $informasiQuery->latest()->limit(10)->get();

            // Kegiatan
            $kegiatanQuery = Kegiatan::with('user')->where('status', 'aktif');

            if ($searchKegiatan) {
                $kegiatanQuery->where(function ($q) use ($searchKegiatan) {
                    $q->where('nama_kegiatan', 'like', "%{$searchKegiatan}%")
                      ->orWhere('deskripsi', 'like', "%{$searchKegiatan}%")
                      ->orWhere('lokasi', 'like', "%{$searchKegiatan}%");
                });
            }

            $kegiatan = $kegiatanQuery->orderBy('tanggal', 'desc')->limit(10)->get();
        }

        // Statistik
        $totalWarga = $isLoggedIn ? Warga::count() : 0;
        $totalUmkm  = Umkm::where('status', 'disetujui')->count();
        $totalInfo  = $isLoggedIn ? Informasi::where('status', 'dipublikasikan')->count() : 0;
        $totalRt    = $rt->count();

        return view('landing.index', compact(
            'rw', 'rt', 'isLoggedIn',
            'informasi', 'kegiatan', 'umkm',
            'searchInformasi', 'searchKegiatan', 'searchUmkm',
            'totalWarga', 'totalUmkm', 'totalInfo', 'totalRt'
        ));
    }
}