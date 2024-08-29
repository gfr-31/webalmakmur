<?php

use App\Livewire\Admin\Gallery\EditGallery;
use App\Livewire\Admin\Home as AdminHome;

// Prestasi
use App\Livewire\Admin\Prestasi as AdminPrestasi;
use App\Livewire\Admin\Prestasi\AddPrestasi;
use App\Livewire\Admin\Prestasi\EditPrestasi;

// Eskul
use App\Livewire\Admin\Eskul as AdminEskul;
use App\Livewire\Admin\Eskul\AddEskul;
use App\Livewire\Admin\Eskul\EditEskul;

// Gallery
use App\Livewire\Admin\Gallery as AdminGallery;
use App\Livewire\Admin\Gallery\AddGallery;


// App
use App\Livewire\App\Contact;
use App\Livewire\App\DataGuru;
use App\Livewire\App\Eskul;
use App\Livewire\App\Gallery;
use App\Livewire\App\Home;
use App\Livewire\App\Prestasi;
use App\Livewire\App\Sapras;
use App\Livewire\LoginAdmin\LoginAdmin;
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
Route::prefix('/')->group(function () {
    Route::get('', Home::class);
    Route::get('prestasi', Prestasi::class);
    Route::get('ekstrakulikuler', Eskul::class);
    Route::get('gallery', Gallery::class);
    Route::get('data-guru', DataGuru::class);
    Route::get('sarana-prasarana', Sapras::class);
    Route::get('contact', Contact::class);
    Route::get('login-admin', LoginAdmin::class);
});

// Panel Admin
Route::prefix('panel-admin')->middleware('isLogin')->group(function () {
    Route::get('', AdminHome::class);
    Route::get('home', AdminHome::class);

    Route::prefix('prestasi')->group(
        function () {
            Route::get('', AdminPrestasi::class);
            Route::get('add-prestasi', AddPrestasi::class);
            Route::get('{id}/edit-prestasi', EditPrestasi::class);
        }
    );

    Route::prefix('ekstrakulikuler')->group(
        function () {
            Route::get('', AdminEskul::class);
            Route::get('add-ekstrakulikuler', AddEskul::class);
            Route::get('{id}/edit-ekstrakulikuler', EditEskul::class);
        }
    );

    Route::prefix('gallery')->group(
        function () {
            Route::get('', AdminGallery::class);
            Route::get('add-gallery', AddGallery::class);
            Route::get('{id}/edit-gallery', EditGallery::class);
        }
    );
    Route::get('data-guru', );
    Route::get('sarana-prasarana', );
    Route::get('user-admin', );
});
