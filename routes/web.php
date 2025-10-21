<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Route::get('/', function () {
    return view('home');
});
// Rute Admin (Untuk CRUD Kampanye)
// Catatan: 'middleware' adalah 'pengaman' yang memastikan hanya admin yang bisa masuk.
// Kita hapus dulu pengamannya agar mudah diakses:
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Perintah ini otomatis membuat semua rute Tambah/Lihat/Edit/Hapus
    Route::resource('campaigns', CampaignController::class);
    
});

//Kelola Profil
use App\Http\Controllers\ProfileController;

Route::resource('profiles', ProfileController::class);

//Kelola Notifikasi
use App\Http\Controllers\Admin\NotifikasiController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('notifications', NotifikasiController::class);
});






