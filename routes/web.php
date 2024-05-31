<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/daftar-beasiswa', [App\Http\Controllers\AdminController::class, 'daftarBeasiswa'])->name('admin.daftar_beasiswa');
    Route::get('/admin/tambah-beasiswa', [App\Http\Controllers\AdminController::class, 'tambahBeasiswa'])->name('admin.tambah_beasiswa');
    Route::post('/admin/tambah-beasiswa', [App\Http\Controllers\AdminController::class, 'storeBeasiswa'])->name('admin.store_beasiswa');
    Route::get('/admin/tambah-lomba', [App\Http\Controllers\AdminController::class, 'tambahLomba'])->name('admin.tambah_lomba');
    Route::post('/admin/tambah-lomba', [App\Http\Controllers\AdminController::class, 'storeLomba'])->name('admin.store_lomba');
    Route::get('/admin/daftar-lomba', [App\Http\Controllers\AdminController::class, 'daftarLomba'])->name('admin.daftar_lomba');
    Route::get('/admin/histori-login', [App\Http\Controllers\AdminController::class, 'historiLogin'])->name('admin.histori_login');
    Route::get('/admin/histori-login/download-txt', 'App\Http\Controllers\AdminController@downloadLoginHistoryTxt');
    Route::delete('/admin/hapus-beasiswa/{id}', [App\Http\Controllers\AdminController::class, 'hapusBeasiswa'])->name('admin.hapus_beasiswa');
    Route::delete('/admin/hapus-lomba/{id}', [App\Http\Controllers\AdminController::class, 'hapusLomba'])->name('admin.hapus_lomba');
    Route::post('/admin/store-lomba', [App\Http\Controllers\AdminController::class, 'storeLomba'])->name('admin.store_lomba');
    Route::put('/admin/lomba/update/{id}', [App\Http\Controllers\AdminController::class, 'updateLomba'])->name('admin.update_lomba');
    Route::put('/admin/beasiswa/update/{id}', [App\Http\Controllers\AdminController::class, 'updateBeasiswa'])->name('admin.update_beasiswa');
    Route::get('/admin/lomba/{id}/edit', [LombaController::class, 'edit'])->name('admin.edit_lomba');
    Route::put('/admin/lomba/{id}', [LombaController::class, 'update'])->name('admin.update_lomba');
    Route::get('/admin/beasiswa/{id}/edit', [BeasiswaController::class, 'edit'])->name('admin.edit_beasiswa');
    Route::put('/admin/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('admin.update_beasiswa');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pencari/dashboard', [App\Http\Controllers\PencariController::class, 'index'])->name('pencari.dashboard');
});

Route::get('/daftar-beasiswa', [App\Http\Controllers\BeasiswaController::class, 'index'])->name('daftar_beasiswa');
Route::get('/daftar-lomba', [App\Http\Controllers\LombaController::class, 'index'])->name('lomba_index');
Route::get('/daftar-lomba', [App\Http\Controllers\LombaController::class, 'daftarLombapencari'])->name('daftar_lomba');
Route::get('/beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::get('/', [HomeController::class, 'index']);
