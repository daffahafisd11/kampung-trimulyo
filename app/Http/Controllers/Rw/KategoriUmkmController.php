<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;

class KategoriUmkmController extends Controller
{
    public function index()
    {
        $kategori = KategoriUmkm::orderBy('nama_kategori')->get();

        return view('rw.kategori-umkm.index', compact('kategori'));
    }

    public function create()
    {
        return view('rw.kategori-umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
        ]);

        KategoriUmkm::create($validated);

        return redirect()->route('rw.kategori-umkm.index')
            ->with('success', 'Kategori UMKM berhasil ditambahkan.');
    }

    public function show(KategoriUmkm $kategori_umkm)
    {
        return redirect()->route('rw.kategori-umkm.edit', $kategori_umkm);
    }

    public function edit(KategoriUmkm $kategori_umkm)
    {
        return view('rw.kategori-umkm.edit', ['kategori' => $kategori_umkm]);
    }

    public function update(Request $request, KategoriUmkm $kategori_umkm)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
        ]);

        $kategori_umkm->update($validated);

        return redirect()->route('rw.kategori-umkm.index')
            ->with('success', 'Kategori UMKM berhasil diperbarui.');
    }

    public function destroy(KategoriUmkm $kategori_umkm)
    {
        $kategori_umkm->delete();

        return redirect()->route('rw.kategori-umkm.index')
            ->with('success', 'Kategori UMKM berhasil dihapus.');
    }
}