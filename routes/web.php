<?php

use App\Http\Controllers\Admin\PointController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Member\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;


// Login Routes
Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-submit');




Route::middleware(['auth', Role::class])->group(function () {

    // Admin Routes
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin-dashboard');


    Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');
    Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout');


    Route::get('/user-index', [AuthController::class, 'userIndex'])->name('index-user');
    Route::get('/user-edit/{id}', [AuthController::class, 'userEdit'])->name('edit-user');
    Route::post('/update-user/{id}', [AuthController::class, 'userUpdate'])->name('update-user');
    Route::get('/user-delete/{id}', [AuthController::class, 'userDelete'])->name('delete-user');


    // Admin Member Routes
    Route::get('/admin-index-members', [MemberController::class, 'adminMemberIndex'])->name('admin-members-index');
    Route::get('/admin-add-members', [MemberController::class, 'adminMemberCreate'])->name('admin-members-add');
    Route::post('/admin-store-members', [MemberController::class, 'adminMemberStore'])->name('admin-members-store');
    Route::get('/admin-edit-members/{id}', [MemberController::class, 'adminMemberEdit'])->name('admin-members-edit');
    Route::post('/admin-update-members/{id}', [MemberController::class, 'adminMemberUpdate'])->name('admin-members-update');
    Route::get('/admin-delete-members/{id}', [MemberController::class, 'adminMemberDestroy'])->name('admin-members-destroy');


    // Admin Point Routes
    Route::get('/index-admin-point', [PointController::class, 'adminPointIndex'])->name('admin-point-index');
    Route::get('/add-admin-point', [PointController::class, 'adminPointCreate'])->name('admin-point-add');
    Route::post('/store-admin-point', [PointController::class, 'adminPointStore'])->name('admin-point-store');
    Route::get('/edit-admin-point/{id}', [PointController::class, 'adminPointEdit'])->name('admin-point-edit');
    Route::post('/update-admin-point/{id}', [PointController::class, 'adminPointUpdate'])->name('admin-point-update');
    Route::get('/admin-delete-members/{id}', [PointController::class, 'adminPointDelete'])->name('admin-members-destroy');


    // Staff Routes
    Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff-dashboard');

    // Staff Member Routes
    Route::get('/index-members', [MemberController::class, 'memberIndex'])->name('members-index');
    Route::get('/add-members', [MemberController::class, 'memberCreate'])->name('members-add');
    Route::post('/store-members', [MemberController::class, 'memberStore'])->name('members-store');
    Route::get('/edit-members/{id}', [MemberController::class, 'memberEdit'])->name('members-edit');
    Route::post('/update-members/{id}', [MemberController::class, 'memberUpdate'])->name('members-update');

    // Staff Point Routes
    Route::get('/index-staff-point', [PointController::class, 'staffPointIndex'])->name('staff-point-index');
    Route::get('/add-staff-point', [PointController::class, 'staffPointCreate'])->name('staff-point-add');
    Route::post('/store-staff-point', [PointController::class, 'staffPointStore'])->name('staff-point-store');
    Route::get('/edit-staff-point/{id}', [PointController::class, 'staffPointEdit'])->name('staff-point-edit');
    Route::post('/update-staff-point/{id}', [PointController::class, 'staffPointUpdate'])->name('staff-point-update');
    Route::get('/staff-delete-members/{id}', [PointController::class, 'staffPointDelete'])->name('staff-members-destroy');

});
