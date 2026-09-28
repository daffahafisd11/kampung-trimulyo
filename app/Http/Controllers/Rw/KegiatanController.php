<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\kegiatanBaruMail;
use App\Models\User;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::with('user');

        if ($request->filled('search')) {
            $query->where('nama_kegiatan', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $kegiatan = $query->latest()->paginate(20)->withQueryString();

        return view('rw.kegiatan.index', compact('kegiatan'));
    }

    public function create() { return view('rw.kegiatan.create'); }

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
                    Mail::to($w->emial)->send(new KegiatanBaruMulai($kegiatan));
                } catch (\Exception $e) {
                    \Log::error('Email gagal ke ' . $w->email . ': ' . $e->getMessage());
                }
            }
        }

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
            'gambar'         => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($kegiatan->gambar) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('rw.kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('rw.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}