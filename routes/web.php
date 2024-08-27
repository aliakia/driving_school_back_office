<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DSController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;




Route::middleware(['auth.check'])->group(function(){
    // Driving School Routes
    Route::prefix('driving-school')->group(function() {
        Route::get('/', [DSController::class, 'index'])->name('drivingSchool');
        Route::get('/data', [DSController::class, 'fetchData'])->name('dsDataUrl');
        Route::get('/create', [DSController::class, 'viewCreateForm'])->name('viewCreateForm');
        Route::post('/submit', [DSController::class, 'createNewDs'])->name('submitDS');
        Route::get('/{ds_code}', [DSController::class, 'viewEditForm'])->name('viewEditForm');
        Route::put('/{ds_code}/edit', [DSController::class, 'updateDs'])->name('updateDs');
        Route::delete('/{ds_code}/delete', [DSController::class, 'deleteDs'])->name('deleteDs');
    });


    // Settings Routes
    Route::prefix('settings')->group(function() {
        Route::get('/', [SettingController::class, 'settingLists'])->name('settings');
    });
});


//Auth Routes
Route::prefix('auth')->group(function() {
    Route::middleware(['logged.check'])->group(function() {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('loginAccount');
    
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logoutAccount');
});
