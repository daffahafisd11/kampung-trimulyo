<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::with(['kategori', 'warga', 'rt'])->latest()->get();
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