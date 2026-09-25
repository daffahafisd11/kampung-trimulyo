<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    private function getRt()
    {
        $rt = Auth::user()->rt;

        if (!$rt) {
            abort(404, 'Data RT tidak ditemukan untuk akun ini.');
        }

        return $rt;
    }

    public function index()
    {
        $rt = $this->getRt();
        $umkm = Umkm::with(['kategori', 'warga'])
            ->whereHas('warga', fn($q) => $q->where('rt_id', $rt->id))
            ->latest()->get();

        return view('rw.rt.umkm.index', compact('umkm'));
    }

    public function updateStatus(Request $request, Umkm $umkm)
    {
        $rt = $this->getRt();
        if ($umkm->warga->rt_id !== $rt->id) abort(403);

        $validated = $request->validate([
            'status' => ['required', 'in:disetujui,ditolak'],
        ]);

        $umkm->update(['status' => $validated['status']]);

        return redirect()->route('rt.umkm.index')->with('success', 'Status UMKM berhasil diubah.');
    }
}