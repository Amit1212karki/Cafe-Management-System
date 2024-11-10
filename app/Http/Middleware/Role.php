<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();

        if ($user->role === 'admin' && !$request->routeIs('admin-dashboard')) {
            return redirect()->route('admin-dashboard');
        }
        if ($user->role === 'staff' && !$request->routeIs('staff-dashboard')) {
            return redirect()->route('staff-dashboard');
        }
        return $next($request);
    }
}
