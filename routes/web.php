<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Member\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;


// Login routes
Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-submit');




Route::middleware(['auth', Role::class])->group(function () {

    // Admin routes
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin-dashboard');


    Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');


    Route::get('/user-index', [AuthController::class, 'userIndex'])->name('index-user');
    Route::get('/user-edit/{id}', [AuthController::class, 'userEdit'])->name('edit-user');
    Route::post('/update-user/{id}', [AuthController::class, 'userUpdate'])->name('update-user');
    Route::get('/user-delete/{id}', [AuthController::class, 'userDelete'])->name('delete-user');



    

    // Admoin Member routes
    Route::get('/admin-index-members', [MemberController::class, 'adminMemberIndex'])->name('admin-members-index');
    Route::get('/admin-add-members', [MemberController::class, 'adminMemberCreate'])->name('admin-members-add');
    Route::post('/admin-store-members', [MemberController::class, 'adminMemberStore'])->name('admin-members-store');
    Route::get('/admin-edit-members/{id}', [MemberController::class, 'adminMemberEdit'])->name('admin-members-edit');
    Route::post('/admin-update-members/{id}', [MemberController::class, 'adminMemberUpdate'])->name('admin-members-update');
    Route::get('/admin-delete-members/{id}', [MemberController::class, 'adminMemberDestroy'])->name('admin-members-destroy');

    // Staff routes
    Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff-dashboard');

    // Member routes
    Route::get('/index-members', [MemberController::class, 'memberIndex'])->name('members-index');
    Route::get('/add-members', [MemberController::class, 'memberCreate'])->name('members-add');
    Route::post('/store-members', [MemberController::class, 'memberStore'])->name('members-store');
    Route::get('/edit-members/{id}', [MemberController::class, 'memberEdit'])->name('members-edit');
    Route::post('/update-members/{id}', [MemberController::class, 'memberUpdate'])->name('members-update');
});
