<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DSController;
use App\Http\Controllers\DSHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;
use App\Http\Controllers\PostController;
use Illuminate\Routing\Controllers\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::middleware(['auth.check'])->group(function(){
    Route::get('/', [DSHomeController::class, 'index'])->name('dashboard');


    // Driving School Routes
    Route::get('/ds', [DSController::class, 'index'])->name('drivingSchool');
    Route::post('/ds', [DSController::class, 'createNewDs'])->name('submitDS');
});

Route::prefix('auth')->group(function() {
    Route::middleware(['logged.check'])->group(function() {
        Route::get('/login', [AuthController::class, 'index'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('loginAccount');
    
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logoutAccount');
});
