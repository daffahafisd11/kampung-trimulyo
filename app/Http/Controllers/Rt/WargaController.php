<?php

namespace App\Http\Controllers\Rt;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    private function getRt()
    {
        $rt = Auth::user()->rt;
        if (!$rt) {
            abort(404, 'Data RT tidak ditemukan untuk akun ini.');
        }

        return $rt;
    }

    public function index (Request $request)
    {
        $rt = $this->getRt();

        $query = Warga::with('user')
            ->where('rt_id', $rt->id);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q  ->where('nama_lengkap', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $warga = $query->orderBy('nama_lengkap')->paginate(20)->withQueryString();

        return view('rt.warga.index', compact('rt', 'warga'));
    }
}
