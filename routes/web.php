<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\TerbobotController;
use App\Http\Controllers\IdealController;
use App\Http\Controllers\JarakController;
use App\Http\Controllers\PreferensiController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction']);
    
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(DosenController::class)->prefix('dosens')->group(function () {
        Route::get('', 'index')->name('dosens');
        Route::get('create', 'create')->name('dosens.create');
        Route::post('store', 'store')->name('dosens.store');
        Route::get('show/{id}', 'show')->name('dosens.show');
        Route::get('edit/{id}', 'edit')->name('dosens.edit');
        Route::put('edit/{id}', 'update')->name('dosens.update');
        Route::delete('destroy/{id}', 'destroy')->name('dosens.destroy');
    });

    Route::get('/settings/bobot', [SettingController::class, 'showBobotForm'])->name('settings.bobot');
    Route::post('/settings/bobot', [SettingController::class, 'bobot'])->name('settings.bobot.store');

    Route::get('normalisasi', [NormalisasiController::class, 'normalisasi'])->name('normalisasi');

    Route::get('/terbobot', [TerbobotController::class, 'normalisasiTerbobot'])->name('topsis.terbobot');

    Route::get('/ideal', [IdealController::class, 'idealSolution'])->name('topsis.ideal');

    Route::get('/jarak', [JarakController::class, 'distance'])->name('topsis.jarak');

    Route::get('/preferensi', [PreferensiController::class, 'preferensi'])->name('topsis.preferensi');
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
