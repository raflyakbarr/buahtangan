<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TrackPublicRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Logika untuk tracking atau analitik
        Log::info('Public route accessed: ' . $request->fullUrl());

        \DB::table('visits')->insert([
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return $next($request);
    }
}
