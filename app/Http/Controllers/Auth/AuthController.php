<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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


    public function registerUser(Request $request)
    {

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'branch' => 'required|string',
            ]);
    
            $registerUser = new User();
            $registerUser->name = $request->name;
            $registerUser->email = $request->email;
            $registerUser->password = Hash::make($request->password);
            $registerUser->branch = $request->branch;
            $registerUser->role = 'staff'; 
            $registerUser->save();
    
            return redirect()->route('login')->with('success', 'Registration successful. Please login.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred during registration: ' . $e->getMessage());
        }

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
    
        return redirect()->route('login')->with('error', 'Invalid credentials.');
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
