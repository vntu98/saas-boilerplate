<?php

use App\Http\Controllers\Accout\AccountController;
use App\Http\Controllers\Accout\DeactivateController;
use App\Http\Controllers\Accout\PasswordController;
use App\Http\Controllers\Accout\ProfileController;
use App\Http\Controllers\Accout\TwoFactorController;
use App\Http\Controllers\Auth\ActivationController;
use App\Http\Controllers\Auth\ActivationResendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Subscription\PlanController;
use App\Http\Controllers\Subscription\PlanTeamController;
use App\Http\Controllers\Subscription\SubscriptionController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'as' => 'account.'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');

    /**
     * Profile
     */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    /**
     * Profile
     */
    Route::get('/twofactor', [TwoFactorController::class, 'index'])->name('twofactor.index');
    Route::post('/twofactor', [TwoFactorController::class, 'store'])->name('twofactor.store');

    /**
     * Deactivate
     */
    Route::get('/deactivate', [DeactivateController::class, 'index'])->name('deactivate.index');
    Route::post('/deactivate', [DeactivateController::class, 'store'])->name('deactivate.store');

    /**
     * Password
     */
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
});

Route::group(['prefix' => 'activation', 'as' => 'activation.', 'middleware' => ['guest']], function () {
    Route::get('/resend', [ActivationResendController::class, 'index'])->name('resend');
    Route::post('/resend', [ActivationResendController::class, 'store'])->name('resend.store');
    Route::get('/{confirmation_token}', [ActivationController::class, 'activate'])->name('activate');
});

Route::group(['prefix' => 'plans', 'as' => 'plans.'], function () {
    Route::get('/', [PlanController::class, 'index'])->name('index');
    Route::get('/teams', [PlanTeamController::class, 'index'])->name('teams.index');
});

Route::group(['prefix' => 'subscription', 'as' => 'subscription.', 'middleware' => ['auth.register']], function () {
    Route::get('/', [SubscriptionController::class, 'index'])->name('index');
    Route::post('/', [SubscriptionController::class, 'store'])->name('store');
});