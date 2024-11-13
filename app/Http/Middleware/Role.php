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

        $adminRoutes = [
            'admin-dashboard',
            'members-add',
            'members-edit',
            'members-store',
            'members-update',
            'members-index',
            'members-destroy',

        ];

        $staffRoutes = [
            'staff-dashboard',
            'members-add',
            'members-edit',
            'members-store',
            'members-index',
            'members-update',
            'members-destroy',

        ];

        if ($user->role === 'admin' && !in_array($request->route()->getName(), $adminRoutes)) {
            return redirect()->route('admin-dashboard');
        }

        if ($user->role === 'staff' && !in_array($request->route()->getName(), $staffRoutes)) {
            return redirect()->route('staff-dashboard');
        }

        return $next($request);
    }
}
