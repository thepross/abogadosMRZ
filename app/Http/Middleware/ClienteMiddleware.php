<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClienteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() != null) {
            if (auth()->user()->rol == 'Cliente' || auth()->user()->rol == 'Administrador') {
                return $next($request);
            }
        } else {
            return redirect()->route('login');
        }
        return redirect()->route('unauthorized');
    }
}
