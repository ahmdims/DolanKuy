<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Define the allowed user types
        $allowedUserTypes = ['superadmin', 'admin_wisata', 'admin_umkm', 'admin_budaya'];

        // Check if the authenticated user's type is not in the allowed list
        if (!in_array(Auth::user()->utype, $allowedUserTypes)) {
            session()->flush();
            return redirect('/');
        }

        return $next($request);
    }
}