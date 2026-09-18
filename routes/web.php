<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('');

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('dashboard');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])
        ->name('profile');

    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'save'])
        ->name('profile.save');

    Route::resource('/admin', App\Http\Controllers\AdminController::class);

    Route::resource('/pasien', App\Http\Controllers\PasienController::class);

    Route::resource('/dokter', App\Http\Controllers\DokterController::class);

    Route::resource('/pendaftaran', App\Http\Controllers\PendaftaranController::class);
});