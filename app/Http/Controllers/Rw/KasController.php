<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\KasRt;
use App\Models\Rt;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $rt = Rt::orderBy('nama_rt')->get();

        $data = $rt->map(function ($r) {
            $masuk = KasRt::where('rt_id', $r->id)->where('jenis', 'masuk')->sum('jumlah');
            $keluar = KasRt::where('rt_id', $r->id)->where('jenis', 'keluar')->sum('jumlah');

            return [
                'rt' => $r,
                'bendahara' => $r->bendahara()->first(),
                'total_masuk' => $masuk,
                'total_keluar' => $keluar,
                'saldo' => $masuk - $keluar,
            ];
        });

        return view('rw.kas.index', compact('data'));
    }

    public function show(Rt $rt)
    {
        $transaksi = KasRt::with('user')
            ->where('rt_id', $rt->id)
            ->orderBy('tanggal', 'desc')
            ->paginate(50);

        $totalMasuk = KasRt::where('rt_id', $rt->id)->where('jenis', 'masuk')->sum('jumlah');
        
        $totalKeluar = KasRt::where('rt_id', $rt->id)->where('jenis', 'keluar')->sum('jumlah');

        $saldo = $totalMasuk - $totalKeluar;

        return view('rw.kas.show', compact(
            'rt', 'transaksi', 'totalMasuk', 'totalKeluar', 'saldo'
        ));
    }

    public function destroy(KasRt $kas)
    {
        $kas->delete();

        return redirect()
            ->route('rw.kas.show', $kas->rt_id)
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
