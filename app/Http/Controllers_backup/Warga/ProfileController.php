<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $warga = Auth::user()->warga;
        return view('rw.warga.profile.edit', compact('warga'));
    }

    public function update(Request $request)
    {
        $warga = Auth::user()->warga;

        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'nama_lengkap'  => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp'         => ['nullable', 'string', 'max:20'],
            'alamat'        => ['nullable', 'string'],
        ]);

        $warga->user->update(['name' => $validated['name']]);
        $warga->update([
            'nama_lengkap'  => $validated['nama_lengkap'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'no_hp'         => $validated['no_hp'] ?? null,
            'alamat'        => $validated['alamat'] ?? null,
        ]);

        return redirect()->route('warga.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}