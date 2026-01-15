<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PerformanceController;


Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/', [PageController::class, 'dashboard'])->name('index');

        Route::resource('users', UserController::class);
        Route::resource('performances', PerformanceController::class);
        // Route::post('performances/{performance}/toggle-publish', [PerformanceController::class, 'togglePublish'])
        //     ->name('performances.toggle_publish');
    });
});

