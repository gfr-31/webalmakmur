<?php

use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PanelAdminController;
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
Route::prefix('/')->group(function() {
    Route::get('', [MasterController::class, 'home']);
    Route::get('prestasi', [MasterController::class, 'prestasi']);
    Route::get('ekstrakulikuler', [MasterController::class, 'eskul']);
    Route::get('gallery', [MasterController::class, 'galery']);
    Route::get('data-guru', [MasterController::class, 'dataguru']);
    Route::get('sarana-prasarana', [MasterController::class, 'sapras']);
    Route::get('contact', [MasterController::class, 'contact']);
    Route::get('login-admin', [LoginAdminController::class, 'index']);
    Route::get('logout', [LoginAdminController::class, 'logout']);
});

// Panel Admin
Route::prefix('panel-admin')->middleware('isLogin')->group(function () {
    Route::get('', [PanelAdminController::class, 'index']);
    Route::get('home', [PanelAdminController::class, 'index']);
    Route::get('prestasi', [PanelAdminController::class, 'prestasi']);
    Route::get('ekstrakulikuler', [PanelAdminController::class, 'ekstrakulikuler']);
    Route::get('gallery', [PanelAdminController::class, 'gallery']);
    Route::get('data-guru', [PanelAdminController::class, 'dataGuru']);
    Route::get('sarana-prasarana', [PanelAdminController::class, 'saranaPrasarana']);
    Route::get('user-admin', [PanelAdminController::class, 'userAdmin']);
});
