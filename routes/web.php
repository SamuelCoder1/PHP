<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::resource('usuarios', UserController::class)->except(['show']);

    Route::get('usuarios/{id}', [UserController::class, 'show'])
        ->where('id', '[0-9]+')
        ->name('usuarios.show');

    Route::get('usuarios/eliminados', [UserController::class, 'trashed'])->name('usuarios.trashed');

    Route::post('usuarios/{id}/restaurar', [UserController::class, 'restore'])->name('usuarios.restore');

    Route::get('/auth/login', [GoogleController::class, 'login'])->name('google.login');

    Route::get('/auth/callback', [GoogleController::class, 'callback'])->name('google.callback');
    
});
