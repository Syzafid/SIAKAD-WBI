<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class EnsureMahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            abort(401, 'Belum login');
        }

        $userId = Auth::id();

        $isMahasiswa = Mahasiswa::where('user_id', $userId)->exists();

        if (!$isMahasiswa) {
            abort(403, 'Akses khusus mahasiswa');
        }

        return $next($request);
    }
}
