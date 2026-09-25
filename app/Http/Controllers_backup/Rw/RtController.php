<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class RtController extends Controller
{
    public function index()
    {
        $rt = Rt::with('rw')->orderBy('nama_rt')->get();
        return view('rw.rt.index', compact('rt'));
    }

    public function create()
    {
        $rw = Rw::all();
        return view('rw.rt.create', compact('rw'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rw_id' => ['required', 'exists:rw,id'],
            'nama_rt' => ['required', 'string', 'max:255'],
        ]);

        Rt::create($validated);

        return redirect()->route('rw.rt.index')->with('success', 'RT berhasil ditambahkan.');
    }

    public function show(Rt $rt)
    {
        return redirect()->route('rw.rt.edit', $rt->id);
    }

    public function edit(Rt $rt)
    {
        $rw = Rw::all();
        return view('rw.rt.edit', compact('rt', 'rw'));
    }

    public function update(Request $request, Rt $rt)
    {
        $validated = $request->validate([
            'rw_id' => ['required', 'exists:rw,id'],
            'nama_rt' => ['required', 'string', 'max:255'],
        ]);

        $rt->update($validated);

        return redirect()->route('rw.rt.index')->with('success', 'RT berhasil diperbarui.');
    }

    public function destroy(Rt $rt)
    {
        $rt->delete();
        return redirect()->route('rw.rt.index')->with('success', 'RT berhasil dihapus.');
    }
}
