<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('users.login');
});

// Authentication Routes
Route::get('register', [ RegistrationController::class, 'showRegistrationForm' ])->name('register');
Route::post('register', [ RegistrationController::class, 'register' ]);

Route::get('login', [ LoginController::class, 'showLoginForm' ])->name('login');
Route::post('login', [ LoginController::class, 'login' ]);

// Forgot Password Form and Email Request
Route::get('forgot-password', [ ForgotPasswordController::class, 'showLinkRequestForm' ])->name('password.request');
Route::post('forgot-password', [ ForgotPasswordController::class, 'sendResetLinkEmail' ])->name('password.email');

// Password Reset Form and Submit
Route::get('reset-password/{token}', [ ResetPasswordController::class, 'showResetForm' ])->name('password.reset');
Route::post('reset-password', [ ResetPasswordController::class, 'reset' ])->name('password.update');

// Dashboard and User Management Routes
Route::middleware([ 'auth' ])->group(function () {
    Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('dashboard');
    Route::post('logout', [ LoginController::class, 'logout' ])->name('logout');

    // Only accessible to admin users
    Route::middleware('role:admin')->group(function () {
        // Route::resource('users', UserController::class)->except([ 'show' ]);
        Route::get('/users', [ UserController::class, 'index' ])->name('users.index');
        Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])->name('users.edit');
        Route::put('/users/{user}', [ UserController::class, 'update' ])->name('users.update');
    });
});

// Route::middleware([ 'auth', 'role:admin' ])->group(function () {
//     Route::get('/users', [ UserController::class, 'index' ])->name('users.index');
//     Route::get('/users/{user}/edit', [ UserController::class, 'edit' ])->name('users.edit');
//     Route::put('/users/{user}', [ UserController::class, 'update' ])->name('users.update');
// });
