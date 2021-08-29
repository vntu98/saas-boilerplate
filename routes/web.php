<?php

use App\Http\Controllers\Accout\AccountController;
use App\Http\Controllers\Accout\PasswordController;
use App\Http\Controllers\Accout\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');

    /**
     * Profile
     */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    /**
     * Password
     */
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
});
