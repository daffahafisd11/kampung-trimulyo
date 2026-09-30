<?php

namespace App\Http\Controllers\Rw;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AkunRtController extends Controller
{
    public function index(Request $request)
    {
        $akunRt = User::where('role', 'rt')
            ->with('rt')
            ->orderBy('name')
            ->get();

        return view('rw.akun-rt.index', compact('akunRt'));
    }

    public function edit(User $user)
    {
        if ($user->role !== 'rt') abort(404);

        $rt = Rt::orderBy('nama_rt')->get();

        return view('rw.akun-rt.edit', compact('user', 'rt'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role !== 'rt') abort(404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'rt_id' => ['required', 'exists:rt,id'],
        ]);

        $user->update($validated);

        return redirect()->route('rw.akun-rt.index')->with('success', 'Akun Rt berhasil diprebarui.');
    }

    public function showResetPassword(User $user) 
    {
        if ($user->role !== 'rt') abort(404);

        return view('rw.akun-rt.reset-password', compact('user'));
    }

    public function resetPassword(Request $request, User $user)
    {
        if ($user->role !== 'rt') abort(404);

        $request->validate([
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('rw.akun-rt.index')->with('success', 'Password Rt berhasil direset.');
    }
}
