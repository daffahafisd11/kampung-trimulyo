<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\KategoriPengaduan;
use App\Models\RiwayatPengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{
    public function index()
    {
        $warga = Auth::user()->warga;
        $pengaduan = Pengaduan::with('kategori')
            ->where('warga_id', $warga->id)
            ->latest()->get();

        return view('rw.warga.pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        $kategori = KategoriPengaduan::orderBy('nama_kategori')->get();
        return view('rw.warga.pengaduan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori_pengaduan,id'],
            'judul'       => ['required', 'string', 'max:255'],
            'lokasi'      => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
        ]);

        $warga = Auth::user()->warga;

        DB::transaction(function () use ($validated, $warga) {
            $pengaduan = Pengaduan::create([
                'warga_id'    => $warga->id,
                'rt_id'       => $warga->rt_id,
                'kategori_id' => $validated['kategori_id'],
                'judul'       => $validated['judul'],
                'lokasi'      => $validated['lokasi'],
                'deskripsi'   => $validated['deskripsi'],
                'status'      => 'menunggu_verifikasi',
            ]);

            // Catat riwayat awal
            RiwayatPengaduan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id'      => Auth::id(),
                'status'       => 'menunggu_verifikasi',
                'catatan'      => 'Pengaduan dibuat oleh warga.',
            ]);
        });

        return redirect()->route('warga.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function show(Pengaduan $pengaduan)
    {
        $warga = Auth::user()->warga;
        if ($pengaduan->warga_id !== $warga->id) {
            abort(403);
        }

        $pengaduan->load('kategori', 'rt', 'riwayat.user');
        return view('rw.warga.pengaduan.show', compact('pengaduan'));
    }

    public function edit(Pengaduan $pengaduan)
    {
        $warga = Auth::user()->warga;
        if ($pengaduan->warga_id !== $warga->id) abort(403);
        if ($pengaduan->status !== 'menunggu_verifikasi') {
            return redirect()->route('warga.pengaduan.index')->with('error', 'Pengaduan sudah diproses, tidak bisa diedit.');
        }

        $kategori = KategoriPengaduan::orderBy('nama_kategori')->get();
        return view('rw.warga.pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $warga = Auth::user()->warga;
        if ($pengaduan->warga_id !== $warga->id) abort(403);
        if ($pengaduan->status !== 'menunggu_verifikasi') abort(403);

        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori_pengaduan,id'],
            'judul'       => ['required', 'string', 'max:255'],
            'lokasi'      => ['required', 'string', 'max:255'],
            'deskripsi'   => ['required', 'string'],
        ]);

        $pengaduan->update($validated);

        return redirect()->route('warga.pengaduan.index')->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $warga = Auth::user()->warga;
        if ($pengaduan->warga_id !== $warga->id) abort(403);
        if ($pengaduan->status !== 'menunggu_verifikasi') abort(403);

        $pengaduan->delete();
        return redirect()->route('warga.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}