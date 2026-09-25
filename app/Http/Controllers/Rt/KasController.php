<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\KasRt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $rt = Auth::user()->rt;
        
        if(!$rt) {
            abort(404, 'Data RT tidak ditemukan untuk akun ini.');
        }

        $rtId = $rt->id;

        $totalMasuk = KasRt::where('rt_id', $rtId)->where('jenis', 'masuk')->sum('jumlah');

        $totalKeluar = KasRt::where('rt_id', $rtId)->where('jenis', 'keluar')->sum('jumlah');

        $saldo = $totalMasuk - $totalKeluar;

        $transaksi = KasRt::with('user')
            ->where('rt_id', $rtId)
            ->orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('rt.kas.index', compact(
            'rt',
            'totalMasuk',
            'totalKeluar',
            'saldo',
            'transaksi'
        ));
    }
}
