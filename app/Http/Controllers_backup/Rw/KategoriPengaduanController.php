<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;

class KategoriPengaduanController extends Controller
{
    public function index()
    {
        $kategori = KategoriPengaduan::orderBy('nama_kategori')->get();

        return view('rw.kategori-pengaduan.index', compact('kategori'));
    }

    public function create()
    {
        return view('rw.kategori-pengaduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        KategoriPengaduan::create($validated);

        return redirect()->route('rw.kategori-pengaduan.index')
            ->with('success', 'Kategori pengaduan berhasil ditambahkan.');
    }

    public function show(KategoriPengaduan $kategori_pengaduan)
    {
        return redirect()->route('rw.kategori-pengaduan.edit', $kategori_pengaduan);
    }

    public function edit(KategoriPengaduan $kategori_pengaduan)
    {
        return view('rw.kategori-pengaduan.edit', ['kategoriPengaduan' => $kategori_pengaduan]);
    }

    public function update(Request $request, KategoriPengaduan $kategori_pengaduan)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $kategori_pengaduan->update($validated);

        return redirect()->route('rw.kategori-pengaduan.index')
            ->with('success', 'Kategori pengaduan berhasil diperbarui.');
    }

    public function destroy(KategoriPengaduan $kategori_pengaduan)
    {
        $kategori_pengaduan->delete();

        return redirect()->route('rw.kategori-pengaduan.index')
            ->with('success', 'Kategori pengaduan berhasil dihapus.');
    }
}