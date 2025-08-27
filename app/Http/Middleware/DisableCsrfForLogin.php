<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableCsrfForLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تعطيل CSRF للـ login routes في Filament
        if ($request->is('admin/login')) {
            $request->session()->regenerateToken();
        }
        
        return $next($request);
    }
}