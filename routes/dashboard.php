<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Dashboard\AnnouncementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Dashboard\SubjectController;
use App\Http\Controllers\Dashboard\ProfessorController;
use App\Http\Controllers\Dashboard\UserController;


Route::middleware(['auth:sanctum', 'role:admin'])->group(function () {
    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::get('/', [PageController::class, 'dashboard'])->name('index');

        Route::resource('users', UserController::class);

        // Route::resource('subjects', SubjectController::class);
        // Route::resource('professors', ProfessorController::class);

    });
});


