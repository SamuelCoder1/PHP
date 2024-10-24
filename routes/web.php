<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::resource('usuarios',UserController::class);
    Route::get('usuarios/{id}/trashed', [UserController::class, 'showWithTrashed'])->name('usuarios.trashed.show');
});
