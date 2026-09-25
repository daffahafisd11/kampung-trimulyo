<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\Rt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class BendaharaController extends Controller
{
    public function index()
    {
        $rt = Rt::with('bendahara')->orderBy('nama_rt')->get();
        return view('rw.bendahara.index', compact('rt'));
    }

    public function edit(Rt $rt)
    {
        $warga = User::where('role', 'warga')
            ->where('rt_id', $rt->id)
            ->orderBy('name')
            ->get();

            return view('rw.bendahara.edit', compact('rt', 'warga'));
    }

    public function update(Request $request, Rt $rt)
    {
        $validated = $request->validate([
            'user_id' => [
                'required',
                Rule::exists('users', 'id')->where(function ($query) use ($rt) {
                    $query->where('role', 'warga')
                        ->where('rt_id', $rt->id);
                }),
            ],
        ]);

        DB::transaction(function () use ($validated, $rt) {
            User::where('rt_id', $rt->id)
                ->where('is_bendahara', true)
                ->update(['is_bendahara' => false]);

            User::whereKey($validated['user_id'])
                ->update(['is_bendahara' => true]);
        });

        return redirect()
            ->route('rw.bendahara.index')
            ->with('success', 'Bendahara berhasil ditunjuk.');
    }
}
