<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\VerifyXAuthorization;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth:sanctum', VerifyXAuthorization::class])->group(function () {

    Route::post('/user/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

    Route::group(['prefix' => 'players'], function () {
        Route::get('/', \App\Http\Controllers\PlayersController::class)->name('players');
        Route::post('/', \App\Http\Controllers\PlayersStoreController::class)->name('players.store');
        Route::put('/{id}', \App\Http\Controllers\PlayersUpdateController::class)->name('players.update');

        Route::delete('/{id}', \App\Http\Controllers\PlayerDeleteController::class)
            ->middleware('check.role:admin')
            ->name('players.delete');
    });
});
