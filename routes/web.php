<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DSController;
use App\Http\Controllers\DSHomeController;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth.check'])->group(function(){
    Route::get('/', [DSHomeController::class, 'index'])->name('dashboard');


    // Driving School Routes
    Route::prefix('driving-school')->group(function() {
        Route::get('/', [DSController::class, 'index'])->name('drivingSchool');
        Route::get('/create', [DSController::class, 'viewCreateForm'])->name('viewCreateForm');
        Route::post('/ds', [DSController::class, 'createNewDs'])->name('submitDS');
        Route::get('/ds/{ds_code}', [DSController::class, 'viewEditForm'])->name('viewEditForm');
        Route::put('/ds/{ds_code}/edit', [DSController::class, 'updateDs'])->name('updateDs');
        Route::delete('/ds/{ds_code}/delete', [DSController::class, 'deleteDs'])->name('deleteDs');
    });
});

Route::prefix('auth')->group(function() {
    Route::middleware(['logged.check'])->group(function() {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('loginAccount');
    
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logoutAccount');
});
