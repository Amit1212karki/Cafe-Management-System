<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;




Route::get('/', [AuthController::class, 'loginForm'])->name('login-form');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register-form');
Route::get('/register', [AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login', [AuthController::class, 'login'])->name('login-submit');

Route::middleware(['auth', Role::class])->group(function () {

    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard'])->name('admin-dashboard');

    Route::get('/staff/dashboard', [AuthController::class, 'staffDashboard'])->name('staff-dashboard');

});