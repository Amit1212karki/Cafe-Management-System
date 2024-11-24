<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
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

            return redirect()->route('index-user')->with('success', 'Registration successful. Please login.');
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

    public function generateGradientColor($index, $total)
    {
        // Generate a color based on the index and total
        $hue = ($index / $total) * 360; // Calculate hue from 0 to 360
        return "hsl($hue, 70%, 50%)"; // Return HSL color (lightness and saturation can be adjusted)
    }
    public function adminDashboard()
    {
        $branches = User::select('branch')
            ->selectRaw('COUNT(members.user_id) as members_count')
            ->leftJoin('members', 'users.id', '=', 'members.user_id')  // Assuming the relation is based on 'user_id'
            ->whereNotNull('members.user_id')
            ->groupBy('branch')
            ->get();

        $branchColors = [];
        $totalBranches = $branches->count();

        foreach ($branches as $index => $branch) {
            $branchColors[$branch->branch] = $this->generateGradientColor($index, $totalBranches);
        }

        return view('dashboard.pages.admin.index', compact('branches', 'branchColors'));
    }

    public function staffDashboard()
    {
        $branches = User::select('branch')
            ->selectRaw('COUNT(members.user_id) as members_count')
            ->leftJoin('members', 'users.id', '=', 'members.user_id')  // Assuming the relation is based on 'user_id'
            ->whereNotNull('members.user_id')
            ->groupBy('branch')
            ->get();

        $branchColors = [];
        $totalBranches = $branches->count();

        foreach ($branches as $index => $branch) {
            $branchColors[$branch->branch] = $this->generateGradientColor($index, $totalBranches);
        }
        return view('dashboard.pages.staff.staffindex', compact('branches', 'branchColors'));
    }

    public function userIndex()
    {
        $all_user = User::all();


        return view('dashboard.pages.admin.user.index', compact('all_user'));
    }

    public function userEdit(Request $request, $id)
    {
        $edit_user = User::findOrFail($id);
        return view('dashboard.pages.admin.user.edit', compact('edit_user'));
    }

    public function userUpdate(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->id,
            'branch' => 'required|string|max:255',
        ]);

        try {
            $user = User::find($request->id);

            if (!$user) {
                return redirect()->back()->with('error', 'User not found!');
            }

            $user->name = $request->name;
            $user->email = $request->email;
            $user->branch = $request->branch;
            $user->save();

            return redirect()->route('index-user')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the user. Please try again.');
        }
    }

    public function userDelete($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'User not found!');
            }
            $user->forceDelete();
            return redirect()->back()->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the user. Please try again.');
        }
    }

    public function logoutUser()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }



    public function changePasswordIndex($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.auth.changepassword',compact('user'));
    }


    public function ChangePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:8'
        ]);

        $user = User::find($id);

        if(Auth::user()->role !== 'admin'){
            return redirect()->back()->withErrors(['error' => 'Unauthorized access.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('index-user')->with('success', "Password for user {$user->name} has been changed successfully.");
    }
}
