<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeAdmin'])->name('dashboard');

        //KELAS
        Route::resource('kelas-kelas', Controllers\Admin\KKelasController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('kelas-siswa', Controllers\Admin\KKelasController::class)->only(['index', 'store', 'update', 'destroy']);
        //MASTER
        Route::resource('tahun-ajaran', Controllers\Admin\MTahunAjaranController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('jurusan', Controllers\Admin\MJurusanController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('kelas', Controllers\Admin\MKelasController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('mapel-umum', Controllers\Admin\MMapelUmumController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('mapel-jurusan', Controllers\Admin\MMapelJurusanController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('ekstrakulikuler', Controllers\Admin\MEskulController::class)->only(['index', 'store', 'update', 'destroy']);
        //USER
        Route::resource('guru', Controllers\Admin\MGuruController::class)->only(['index', 'store', 'update', 'destroy']);
    });
});

Route::middleware(['auth', 'walas'])->group(function () {
    Route::prefix('walas')->name('walas.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeWalas'])->name('dashboard');
    });
});

Route::middleware(['auth', 'guru'])->group(function () {
    Route::prefix('guru')->name('guru.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeGuru'])->name('dashboard');
    });
});

Route::middleware(['auth', 'murid'])->group(function () {
    Route::prefix('murid')->name('murid.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeMurid'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
