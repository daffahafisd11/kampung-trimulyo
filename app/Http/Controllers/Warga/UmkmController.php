<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\KategoriUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $warga = Auth::user()->warga;
        
        $query = Umkm::with('kategori') 
            ->where('warga_id', $warga->id);

            if ($request->filled('search')) {
                $query->where('nama_usaha', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

        $umkm = $query->latest()->paginate(20)->withQueryString();

        return view('warga.umkm.inddex', compact('umkm'));
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
            'nama_usaha' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'whatsapp' => ['required', 'string', 'max:20'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        $warga = Auth::user()->warga;

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('umkm', 'public');
        }

        $validated['warga_id'] = $warga->id;
        $validated['status'] = 'menunggu_verifikasi';
        Umkm::create($validated);

        return redirect()->route('warga.umkm.index')->with('success', 'UMKM berhasil didaftarkan');
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
            'nama_usaha' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'whatsapp' => ['required', 'string', 'max:20'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $fotoLama = $umkm->foto;
            $validated['foto'] = $request->file('foto')->store('umkm', 'public');

            if ($fotoLama) {
                Storage::disk('public')->delete($fotoLama);
            }
        }

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