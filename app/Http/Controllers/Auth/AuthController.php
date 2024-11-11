<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('dashboard.auth.login');
    }

    public function registerForm()
    {
        return view('dashboard.auth.register');
    }

    public function dashboard()
    {
        return view('dashboard.pages.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return redirect()->route('admin-dashboard')->with('success', 'Successfully logged in as Admin.');
            } elseif ($user->role === 'staff' && $user->branch) {
                return redirect()->route('staff-dashboard')->with('success', 'Successfully logged in as Staff.');
            }
        }
    
        return redirect()->route('login-form')->with('error', 'Invalid credentials.');
    }

    public function adminDashboard()
    {
        return view('dashboard.pages.admin.index');
    }

    public function staffDashboard()
    {
        return view('dashboard.pages.staff.staffindex');
    }
    
}
