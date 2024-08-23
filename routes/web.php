<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::prefix('admin')->middleware('admin')->group( function (){
    Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile',[AdminDashboardController::class, 'profile'])->name('admin.profile');
});

//Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/forget-password', [AdminAuthController::class, 'forgetPassword'])->name('admin.forget-password');
    Route::post('/forget-password', [AdminAuthController::class, 'forgetPasswordSubmit'])->name('admin.forget-password.submit');
    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'resetPassword'])->name('admin.reset-password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'resetPasswordSubmit'])->name('admin.reset-password.submit');
});
