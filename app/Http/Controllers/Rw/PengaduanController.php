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
        };

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->latest()->paginate(20)->withQueryString();

        return view('rw.pengaduan.index', compact('pengaduan'));
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