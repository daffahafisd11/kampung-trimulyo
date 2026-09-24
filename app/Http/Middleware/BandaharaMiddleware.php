<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BandaharaMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!Auth::user()->asis_bendahara) {
            abort(403, "Hanaya Bendahara yang boleh mengakses halaman ini.");
        }

        return $next($request);
    }
}
