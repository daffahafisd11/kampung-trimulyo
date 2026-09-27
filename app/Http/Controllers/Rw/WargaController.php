<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Warga;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class WargaController extends Controller
{
    public function index()
    {
        $query = Warga::with(['user', 'rt']);

        if($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q  ->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('user', fn($u) => $u->where('email', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('rt_id')) {
            $query->where('rt_id', $request->rt_id);
        }

        $warga = $query->orderBy('nama_lengkap')->paginate(20)->withQueryString();

        $rt = Rt::orderBy('nama_rt')->get();

        return view('rw.warga.index', compact('warga', 'rt'));
    }

    public function create()
    {
        $rt = Rt::orderBy('nama_rt')->get();
        return view('rw.warga.create', compact('rt'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'unique:users,email'],
            'password'      => ['required', 'confirmed', Password::min(6)],
            'rt_id'         => ['required', 'exists:rt,id'],
            'nik'           => ['required', 'digits:16', 'unique:warga,nik'],
            'nama_lengkap'  => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp'         => ['nullable', 'string', 'max:20'],
            'alamat'        => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($validated) {
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => 'warga',
            ]);

            Warga::create([
                'user_id'       => $user->id,
                'rt_id'         => $validated['rt_id'],
                'nik'           => $validated['nik'],
                'nama_lengkap'  => $validated['nama_lengkap'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'no_hp'         => $validated['no_hp'] ?? null,
                'alamat'        => $validated['alamat'] ?? null,
            ]);
        });

        return redirect()->route('rw.warga.index')->with('success', 'Warga berhasil ditambahkan.');
    }

    public function show(Warga $warga)
    {
        return redirect()->route('rw.warga.edit', $warga->id);
    }

    public function edit(Warga $warga)
    {
        $rt = Rt::orderBy('nama_rt')->get();
        return view('rw.warga.edit', compact('warga', 'rt'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', Rule::unique('users', 'email')->ignore($warga->user_id)],
            'rt_id'         => ['required', 'exists:rt,id'],
            'nik'           => ['required', 'digits:16', Rule::unique('warga', 'nik')->ignore($warga->id)],
            'nama_lengkap'  => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date'],
            'no_hp'         => ['nullable', 'string', 'max:20'],
            'alamat'        => ['nullable', 'string'],
        ]);

        DB::transaction(function () use ($validated, $warga) {
            $warga->user->update([
                'name'  => $validated['name'],
                'email' => $validated['email'],
            ]);

            $warga->update([
                'rt_id'         => $validated['rt_id'],
                'nik'           => $validated['nik'],
                'nama_lengkap'  => $validated['nama_lengkap'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'no_hp'         => $validated['no_hp'] ?? null,
                'alamat'        => $validated['alamat'] ?? null,
            ]);
        });

        return redirect()->route('rw.warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy(Warga $warga)
    {
        DB::transaction(function () use ($warga) {
            $warga->user->delete();
        });

        return redirect()->route('rw.warga.index')->with('success', 'Warga berhasil dihapus.');
    }
}