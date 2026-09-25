<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::with('user')->latest()->get();
        return view('rw.kegiatan.index', compact('kegiatan'));
    }

    public function create() { return view('rw.kegiatan.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan'  => ['required', 'string', 'max:255'],
            'tanggal'        => ['required', 'date'],
            'waktu_mulai'    => ['required'],
            'waktu_selesai'  => ['required', 'after:waktu_mulai'],
            'lokasi'         => ['required', 'string', 'max:255'],
            'deskripsi'      => ['required', 'string'],
            'status'         => ['required', 'in:aktif,selesai,dibatalkan'],
        ]);

        $validated['user_id'] = Auth::id();
        Kegiatan::create($validated);

        return redirect()->route('rw.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Kegiatan $kegiatan) { return redirect()->route('rw.kegiatan.edit', $kegiatan->id); }

    public function edit(Kegiatan $kegiatan)
    {
        return view('rw.kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'nama_kegiatan'  => ['required', 'string', 'max:255'],
            'tanggal'        => ['required', 'date'],
            'waktu_mulai'    => ['required'],
            'waktu_selesai'  => ['required', 'after:waktu_mulai'],
            'lokasi'         => ['required', 'string', 'max:255'],
            'deskripsi'      => ['required', 'string'],
            'status'         => ['required', 'in:aktif,selesai,dibatalkan'],
        ]);

        $kegiatan->update($validated);
        return redirect()->route('rw.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('rw.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}