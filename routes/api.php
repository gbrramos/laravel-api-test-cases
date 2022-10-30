<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TodoController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function() {
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::post('register', 'register')->name('register');
});

Route::controller(TodoController::class)->group(function() {
    Route::get('todos', 'index');
});

Route::any('{slug}', function () {
    return response()->json([
        'message' => 'Route not found',
    ], 404);
});

