<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index()
    {
        $informasi = Informasi::with('user')->latest()->get();
        return view('rw.informasi.index', compact('informasi'));
    }

    public function create()
    {
        return view('rw.informasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'   => ['required', 'string', 'max:255'],
            'isi'     => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'status'  => ['required', 'in:draft,dipublikasikan'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $validated['user_id'] = Auth::id();
        Informasi::create($validated);

        return redirect()->route('rw.informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function show(Informasi $informasi) { return redirect()->route('rw.informasi.edit', $informasi->id); }

    public function edit(Informasi $informasi)
    {
        return view('rw.informasi.edit', compact('informasi'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $validated = $request->validate([
            'judul'   => ['required', 'string', 'max:255'],
            'isi'     => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'status'  => ['required', 'in:draft,dipublikasikan'],
            'gambar'  => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($informasi->gambar) {
                Storage::disk('public')->delete($informasi->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('informasi', 'public');
        }

        $informasi->update($validated);

        return redirect()->route('rw.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Informasi $informasi)
    {
        $informasi->delete();
        return redirect()->route('rw.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}