<?php

use App\Http\Controllers\AccountController;
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


    //Account Controller
    Route::prefix('accounts')->group(function(){
        Route::get('/', [AccountController::class, 'index'])->name('accounts');
        Route::get('/data', [AccountController::class, 'fetchData'])->name('accountsDataUrl');
        Route::post('/create', [AccountController::class, 'createAccount'])->name('createAccount');
        Route::get('/edit/{user_id}', [AccountController::class, 'viewEditForm'])->name('editAccForm');
        Route::post('/edit/{user_id}', [AccountController::class, 'editAccount'])->name('editAccount');
        Route::delete('/delete/{user_id}', [AccountController::class, 'deleteAccount'])->name('deleteAccount');
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
