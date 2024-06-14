<?php

use App\Http\Controllers\LoginAdmin;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// MasterLayout
Route::get('/', [MasterController::class, 'home']);
Route::get('/prestasi', [MasterController::class, 'prestasi'] );
Route::get('/ekstrakulikuler', [MasterController::class, 'eskul'] );
Route::get('/gallery', [MasterController::class, 'galery'] );
Route::get('/data-guru', [MasterController::class, 'dataguru'] );
Route::get('/sarana-prasarana', [MasterController::class, 'sapras'] );
Route::get('/contact', [MasterController::class, 'contact'] );
Route::get('/login-admin', [LoginAdmin::class, 'index']);