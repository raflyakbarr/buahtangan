<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $userRole = Auth::user()->role;
        // Jika user adalah super_admin, izinkan akses ke semua route
        if ($userRole === 'super_admin') {
            return $next($request);
        }
        // Jika tidak, periksa apakah role users ada dalam daftar role skuy yang diizinkan
        foreach ($roles as $role) {
            if ($userRole === $role) {
                return $next($request);
            }
        }
        
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses untuk halaman tersebut.');
    }
}