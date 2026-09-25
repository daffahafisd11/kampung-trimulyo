<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\KasRt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $rtId = $user->rt_id;

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
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view('bendahara.kas.index', compact(
            'totalMasuk', 'totalKeluar', 'saldo', 'transaksi'
        ));
    }

    public function create()
    {
        return view('bendahara.kas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'jenis' => ['required', 'in:masuk,keluar'],
            'kategori' => ['required', 'string', 'max:100'],
            'keterangan' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:1'],
        ]);

        $validated['rt_id'] = Auth::user()->rt_id;
        $validated['user_id'] = Auth::id();

        KasRt::create($validated);

        return redirect()
        ->route('bendahara.kas.index')
        ->with('success', 'Transaksi berhasil dicatat.');
    }

    public function show(KasRt $kas)
    {
        $this->authorizeKas($kas);
        return view('bendahara.kas.show', compact('kas'));
    }

    public function edit(KasRt $kas)
    {
        $this->authorizeKas($kas);
        return view('bendahara.kas.edit', compact('kas'));
    }

    public function update(Request $request, KasRt $kas)
    {
        $this->authorizeKas($kas);

        $validated = $request->validate([
            'tanggal' => ['required', 'date'],
            'jenis' => ['required', 'in:masuk,keluar'],
            'kategori' => ['required', 'string', 'max:100'],
            'keterangan' => ['required', 'string', 'max:255'],
            'jumlah' => ['required', 'numeric', 'min:1']
        ]);

        $kas->update($validated);

        return redirect()
        ->route('bendahara.kas.index')
        ->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(KasRt $kas)
    {
        $this->authorizeKas($kas);
        $kas->delete();

        return redirect()
        ->route('bendahara.kas.index')
        ->with('success', 'Transaksi berhasil dihapus.');
    }

    private function authorizeKas(KasRt $kas): void
    {
        if ($kas->rt_id !== Auth::user()->rt_id) {
            abort(403, 'Anda tidak boleh mengakses data RT lain.');
        }
    }
}
