<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Member\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;


// Login routes
Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-submit');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');



Route::middleware(['auth', Role::class])->group(function () {

    // Admin routes
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin-dashboard');

    // Staff routes
    Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff-dashboard');

    // Member routes
    Route::get('/index-members', [MemberController::class, 'memberIndex'])->name('members-index');
    Route::get('/create-members', [MemberController::class, 'memberCreate'])->name('members-create');
    Route::post('/store-members', [MemberController::class, 'memberStore'])->name('members-store');
    Route::get('/edit-members/{id}', [MemberController::class, 'memberEdit'])->name('members-edit');
    Route::put('/update-members/{id}', [MemberController::class, 'memberUpdate'])->name('members-update');
    Route::delete('/delete-members/{id}', [MemberController::class, 'memberDestroy'])->name('members-destroy');
});
