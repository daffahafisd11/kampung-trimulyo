<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    public function index()
    {
        $warga = Auth::user()->warga;
        $umkm = Umkm::with('kategori')->where('warga_id', $warga->id)->latest()->get();
        return view('warga.umkm.index', compact('umkm'));
    }

    public function create()
    {
        $kategori = KategoriUmkm::orderBy('nama_kategori')->get();
        return view('warga.umkm.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori_umkm,id'],
            'nama_usaha'  => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'alamat'      => ['required', 'string'],
            'whatsapp'    => ['required', 'string', 'max:20'],
        ]);

        $warga = Auth::user()->warga;

        Umkm::create([
            'warga_id'    => $warga->id,
            'kategori_id' => $validated['kategori_id'],
            'nama_usaha'  => $validated['nama_usaha'],
            'deskripsi'   => $validated['deskripsi'],
            'alamat'      => $validated['alamat'],
            'whatsapp'    => $validated['whatsapp'],
            'status'      => 'menunggu_verifikasi',
        ]);

        return redirect()->route('warga.umkm.index')->with('success', 'UMKM berhasil didaftarkan.');
    }

    public function show(Umkm $umkm)
    {
        $warga = Auth::user()->warga;
        if ($umkm->warga_id !== $warga->id) abort(403);
        return view('warga.umkm.show', compact('umkm'));
    }

    public function edit(Umkm $umkm)
    {
        $warga = Auth::user()->warga;
        if ($umkm->warga_id !== $warga->id) abort(403);

        $kategori = KategoriUmkm::orderBy('nama_kategori')->get();
        return view('warga.umkm.edit', compact('umkm', 'kategori'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $warga = Auth::user()->warga;
        if ($umkm->warga_id !== $warga->id) abort(403);

        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori_umkm,id'],
            'nama_usaha'  => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
            'alamat'      => ['required', 'string'],
            'whatsapp'    => ['required', 'string', 'max:20'],
        ]);

        // Setelah edit, kembalikan ke menunggu verifikasi
        $validated['status'] = 'menunggu_verifikasi';
        $umkm->update($validated);

        return redirect()->route('warga.umkm.index')->with('success', 'UMKM berhasil diperbarui, menunggu verifikasi ulang.');
    }

    public function destroy(Umkm $umkm)
    {
        $warga = Auth::user()->warga;
        if ($umkm->warga_id !== $warga->id) abort(403);

        $umkm->delete();
        return redirect()->route('warga.umkm.index')->with('success', 'UMKM berhasil dihapus.');
    }
}