<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, string $role)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/'); // belum login
        }

        if ($user->role !== $role) {
            abort(403, 'Unauthorized.'); // role tidak sesuai
        }

        return $next($request);
    }
}
