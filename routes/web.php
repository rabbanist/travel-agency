<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


//Frontend Routes
Route::get('/',[FrontendController::class, 'index'])->name('home');
Route::get('/about',[FrontendController::class, 'about'])->name('about');
Route::get('/registration',[FrontendController::class, 'registration'])->name('registration');
Route::post('/registration',[FrontendController::class, 'registrationSubmit'])->name('registration.submit');
Route::get('/registration-verify-email/{email}/{token}',[FrontendController::class, 'registrationVerifyEmail'])->name('registration_verify_email');
Route::get('/login',[FrontendController::class, 'login'])->name('login');
Route::post('/login',[FrontendController::class, 'loginSubmit'])->name('login.submit');
Route::get('/forget-password',[FrontendController::class, 'forgetPassword'])->name('forget-password');
Route::post('/forget-password',[FrontendController::class, 'forgetPasswordSubmit'])->name('forget-password.submit');
Route::get('/reset-password/{token}/{email}', [FrontendController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/{token}/{email}', [FrontendController::class, 'resetPasswordSubmit'])->name('reset-password.submit');

//User Authentication Routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard',[UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/logout',[UserController::class, 'logout'])->name('user.logout');
    Route::get('/profile',[UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class, 'profileUpdate'])->name('user.profile.update');
});


//Admin
Route::prefix('admin')->middleware('admin')->group( function (){
    Route::get('/dashboard',[AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/profile',[AdminDashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/profile',[AdminDashboardController::class, 'profileUpdate'])->name('admin.profile.update');

    //Slider Routes
    Route::get('/slider',[AdminSliderController::class, 'index'])->name('admin.slider.index');
    Route::get('/slider/create',[AdminSliderController::class, 'create'])->name('admin.slider.create');
    Route::post('/slider/create',[AdminSliderController::class, 'store'])->name('admin.slider.store');
    Route::get('/slider/edit/{id}',[AdminSliderController::class, 'edit'])->name('admin.slider.edit');
    Route::post('/slider/edit/{id}',[AdminSliderController::class, 'update'])->name('admin.slider.update');
    Route::get('/slider/delete/{id}',[AdminSliderController::class, 'delete'])->name('admin.slider.delete');
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
