<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index(Request $request)
    {
        $query = Umkm::with(['kategori', 'warga.rt']);
        if ($request->filled('search')) {
            $query->where('nama_usaha', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $umkm = $query->latest()->paginate(20)->withQueryString();

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