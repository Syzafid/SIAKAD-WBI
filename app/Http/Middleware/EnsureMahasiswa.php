<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EnsureMahasiswa
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            abort(401, 'Belum login');
        }

        if ($user->role !== 'mahasiswa') {
            abort(403, 'Akses khusus mahasiswa');
        }

        return $next($request);
    }
}
