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
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
    
        // Check admin role and route access
        if ($user->role === 'admin' && !$request->routeIs('admin-dashboard', 'members-add', 'members-store', 'members-index')) {
            return redirect()->route('admin-dashboard');
        }
    
        // Check staff role and route access
        if ($user->role === 'staff' && !$request->routeIs('staff-dashboard', 'members-add', 'members-store', 'members-index')) {
            return redirect()->route('staff-dashboard');
        }
    
        return $next($request);
    }
}
