<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\KasRt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $warga = Auth::user()->warga;
        $rtId = $warga->rt_id;

        $totalMasuk = KasRt::where('rt_id', $rtId)
        ->where('jenis', 'masuk')
        ->sum('jumlah');

        $totalKeluar = KasRt::where('rt_id', $rtId)
        ->where('jenis', 'keluar')
        ->sum('jumlah');

        $saldo = $totalMasuk - $totalKeluar;

        $transaksi = KasRt::with('user')
        ->where('rt_id', $rtId)
        ->orderBy('tanggal', 'desc')
        ->paginate(20);

        return view('warga.kas.index', compact(
            'totalMasuk', 'totalKeluar', 'saldo', 'transaksi'
        ));
    }
}
