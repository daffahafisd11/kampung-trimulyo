<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\KegiatanBaruMail;
use App\Models\User;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::with('user');

        if ($request->filled('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }

        $kegiatan = $query->latest()->paginate(20)->withQueryString();

        return view('rt.kegiatan.index', compact('kegiatan'));
    }

    public function create() { return view('rt.kegiatan.create'); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => ['required', 'string', 'max:255'],
            'tanggal' => ['required', 'date'],
            'waktu_mulai' => ['required'],
            'waktu_selesai' => ['required', 'after:waktu_mulai'],
            'lokasi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'status' => ['required', 'in:aktif,selesai,dibatalkan'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $validated['user_id'] = Auth::id();
        $kegiatan = Kegiatan::create($validated);

        if ($kegiatan->status === 'aktif') {
            $warga = User::where('role', 'warga')->get();
            foreach ($warga as $w) {
                try {
                    Mail::to($w->email)->send(new KegiatanBaruMail($kegiatan));
                } catch (\Exception $th) {
                    \Log::error('Email gagal ke ' . $w->email . ': ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('rt.kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Kegiatan $kegiatan) { return redirect()->route('rt.kegiatan.edit', $kegiatan->id); }

    public function edit(Kegiatan $kegiatan)
    {
        return view('rt.kegiatan.edit', compact('kegiatan'));
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
            'gambar'         => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('rt.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('rt.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}