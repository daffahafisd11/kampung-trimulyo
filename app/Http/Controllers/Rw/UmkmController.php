<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Umkm;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::with(['kategori', 'warga.rt'])->latest()->get();
        return view('rw.umkm.index', compact('umkm'));
    }

    public function show(Umkm $umkm)
    {
        $umkm->load('kategori', 'warga.rt');
        return view('rw.umkm.show', compact('umkm'));
    }

    public function create() { abort(404); }
    public function store() { abort(404); }
    public function edit(Umkm $umkm) { abort(404); }
    public function update() { abort(404); }
    public function destroy(Umkm $umkm) { abort(404); }
}