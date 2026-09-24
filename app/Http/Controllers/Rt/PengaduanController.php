<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\RiwayatPengaduan;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    // Ambil RT dari user login (sementara: RT pertama)
    private function getRt()
    {
        // TODO: ganti ke relasi user->rt setelah ditambahkan
        return Rt::first();
    }

    public function index()
    {
        $rt = $this->getRt();
        $pengaduan = Pengaduan::with(['kategori', 'warga'])
            ->where('rt_id', $rt->id)
            ->latest()->get();

        return view('rw.rt.pengaduan.index', compact('pengaduan'));
    }

    public function show(Pengaduan $pengaduan)
    {
        $rt = $this->getRt();
        if ($pengaduan->rt_id !== $rt->id) abort(403);

        $pengaduan->load('kategori', 'warga', 'riwayat.user');
        return view('rw.rt.pengaduan.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $rt = $this->getRt();
        if ($pengaduan->rt_id !== $rt->id) abort(403);

        $validated = $request->validate([
            'status'  => ['required', 'in:diterima,diproses,selesai,ditolak'],
            'catatan' => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($validated, $pengaduan) {
            $pengaduan->update([
                'status'  => $validated['status'],
                'catatan' => $validated['catatan'] ?? $pengaduan->catatan,
            ]);

            RiwayatPengaduan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id'      => Auth::id(),
                'status'       => $validated['status'],
                'catatan'      => $validated['catatan'] ?? null,
            ]);
        });

        return redirect()->route('rt.pengaduan.show', $pengaduan->id)->with('success', 'Status berhasil diubah.');
    }
}