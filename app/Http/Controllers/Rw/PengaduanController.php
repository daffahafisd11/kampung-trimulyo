<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::with(['kategori', 'warga', 'rt']);

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('rt_id')) {
            $query->where('rt_id', $request->rt_id);
        }

        $pengaduan = $query->latest()->paginate(20)->withQueryString();

        $rt = \App\Models\Rt::orderBy('nama_rt')->get();

        return view('rw.pengaduan.index', compact('pengaduan', 'rt'));
    }

    public function show(Pengaduan $pengaduan)
    {
        $pengaduan->load('kategori', 'warga', 'rt', 'riwayat.user');
        return view('rw.pengaduan.show', compact('pengaduan'));
    }

    public function create() { abort(404); }
    public function store() { abort(404); }
    public function edit(Pengaduan $pengaduan) { abort(404); }
    public function update() { abort(404); }
    public function destroy(Pengaduan $pengaduan) { abort(404); }
}