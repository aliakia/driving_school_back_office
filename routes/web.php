<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DSHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\laravel_example\UserManagement;


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





Route::get('/', [DSHomeController::class, 'index'])->name('dashboard');

Route::get('/auth/login', [AuthController::class, 'index'])->name('loginPage');
Route::post('/auth/login', [AuthController::class, 'store'])->name('loginAccount');
