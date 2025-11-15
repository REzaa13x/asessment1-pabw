<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Authentication Routes
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.process');

Route::get('/', [App\Http\Controllers\Controller::class, 'home'])->name('home');

// Admin routes - protected
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', function () {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Akses ditolak. Anda bukan admin.');
            }
            return view('admin.dashboard');
        })->name('dashboard');

        Route::resource('campaigns', CampaignController::class);

        // Settings route
        Route::get('settings', function () {
            if (auth()->user()->role !== 'admin') {
                abort(403, 'Akses ditolak. Anda bukan admin.');
            }
            return view('admin.settings');
        })->name('settings');
    });
});

// Profile routes - accessible by all authenticated users
use App\Http\Controllers\ProfileController;
Route::middleware(['auth'])->resource('profiles', ProfileController::class);

use App\Http\Controllers\Admin\NotifikasiController;

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('notifications', NotifikasiController::class);
});






