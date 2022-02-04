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
        Route::resource('kelas-siswa', Controllers\Admin\KKelasController::class);
        Route::resource('add-siswa-to-kelas', Controllers\Admin\KKelasSiswaController::class);
        //MASTER
        Route::resource('tahun-ajaran', Controllers\Admin\MTahunAjaranController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('jurusan', Controllers\Admin\MJurusanController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('kelas', Controllers\Admin\MKelasController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('mapel-umum', Controllers\Admin\MMapelUmumController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('mapel-jurusan', Controllers\Admin\MMapelJurusanController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('ekstrakulikuler', Controllers\Admin\MEskulController::class)->only(['index', 'store', 'update', 'destroy']);
        //USER
        Route::resource('guru', Controllers\Admin\MGuruController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('guru-bk', Controllers\Admin\MGuruBkController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('siswa', Controllers\Admin\MSiswaController::class)->only(['index', 'store', 'update', 'destroy']);
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
        //
        Route::resource('input-nilai', Controllers\Guru\NilaiController::class)->except(['edit']);
        Route::get('/input-nilai/{kelas_id}/{murid_id}/{mapel_id}', [App\Http\Controllers\Guru\NilaiController::class, 'edit'])->name('input-nilai.edit');
        //WALI KELAS
        Route::resource('kelas-saya', Controllers\Guru\KelasController::class);
        Route::resource('input-catatan', Controllers\Guru\CatatanController::class)->except(['show']);
        Route::get('/input-catatan/{kelas_id}/{murid_id}', [App\Http\Controllers\Guru\CatatanController::class, 'show'])->name('input-catatan.show');
    });
});

Route::middleware(['auth', 'gurubk'])->group(function () {
    Route::prefix('guru-bk')->name('guru-bk.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeGuruBk'])->name('dashboard');
        //
        Route::resource('input-absensi', Controllers\GuruBk\AbsensiController::class)->except(['show']);
        Route::get('/input-absensi/{kelas_id}/{murid_id}', [App\Http\Controllers\GuruBk\AbsensiController::class, 'show'])->name('input-absensi.show');
    });
});

Route::middleware(['auth', 'murid'])->group(function () {
    Route::prefix('murid')->name('murid.')->group(function (){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'homeMurid'])->name('dashboard');
        Route::resource('rapor', Controllers\Siswa\RaporController::class);
        Route::resource('profile', Controllers\Siswa\ProfileController::class);
    });
});

require __DIR__.'/auth.php';
