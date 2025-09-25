<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ini adalah satu-satunya blok pengecekan yang kita butuhkan.
        // Pengecekan dilakukan secara berurutan:
        // 1. Apakah user sudah login?
        // 2. Apakah relasi 'role' ada (tidak null)?
        // 3. Apakah nama role-nya 'Admin Fakultas'?
        if (Auth::check() && Auth::user()->role && Auth::user()->role->name == 'Admin Fakultas') {
            // Jika semua kondisi terpenuhi, izinkan akses.
            return $next($request);
        }

        // Jika salah satu kondisi gagal, alihkan ke dashboard dengan pesan error.
        return redirect('/dashboard')->with('error', 'Anda tidak memiliki hak akses Admin.');
    }
}