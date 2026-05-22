<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /** @param string ...$roles */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!in_array(Auth::user()->role, $roles)) {
            return match (Auth::user()->role) {
                'admin' => redirect('/admin/dashboard'),
                'petugas' => redirect('/petugas/dashboard'),
                default => redirect('/login'),
            };
        }

        return $next($request);
    }
}
