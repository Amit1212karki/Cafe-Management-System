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
            'admin-members-add',
            'admin-members-edit',
            'admin-members-store',
            'admin-members-update',
            'admin-members-index',
            'admin-members-destroy',
            'register-form',
            'register-user',
            'index-user',
            'edit-user',
            'delete-user',
            'update-user',
        ];

        $staffRoutes = [
            'staff-dashboard',
            'members-add',
            'members-edit',
            'members-store',
            'members-index',
            'members-update',
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
