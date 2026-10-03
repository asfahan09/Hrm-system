<?php

use App\Http\Controllers\api\v1\attendence\AttendenceController;
use App\Http\Controllers\api\v1\auth\AuthController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api::')->group(function () {
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/auth/profile', [AuthController::class, 'profile'])->name('profile');

        Route::prefix('attendence')->name('attendence.')->group(function () {
            Route::get('/', [AttendenceController::class, 'index'])->name('index');
            Route::get('check-in', [AttendenceController::class, 'checkIn'])->name('check-in');
            Route::get('check-out', [AttendenceController::class, 'checkOut'])->name('check-out');
            Route::get('daily-summary', [AttendenceController::class, 'dailySummary'])->name('daily-summary');
            Route::get('monthly-summary', [AttendenceController::class, 'monthlySummary'])->name('monthly-summary');
        });
    });
});
