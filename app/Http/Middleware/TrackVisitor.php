<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Mencatat kunjungan ke dalam log atau database
        Log::info('Pengunjung baru', ['ip' => $request->ip(), 'url' => $request->url()]);

        // Simpan data kunjungan ke database
        \DB::table('visits')->insert([
            'ip' => $request->ip(),
            'url' => $request->url(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $next($request);
    }
}
