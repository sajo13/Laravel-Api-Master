<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\UserController;


Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('blogs', BlogController::class);
    Route::get('user', function (Request $request) {
        return $request->user();
    })->name('user');
});

Route::patch('/users/{user}', [UserController::class, 'update']);