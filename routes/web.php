<?php

use App\Http\Controllers\API\PeminjamanDetailController;
use App\Http\Controllers\WEB\WebAnggotaController;
use App\Http\Controllers\WEB\WebPenerbitController;
use App\Http\Controllers\WEB\WebPengarangController;
use App\Http\Controllers\WEB\WebPetugasController;
use Illuminate\Support\Facades\Route;

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
    return view('layout.index');
});

Route::prefix('/perpustakaan')->group(function () {
    Route::prefix('/anggota')->group(function () {
        Route::get('/', [WebAnggotaController::class, 'index'])->name('anggota.index');
        Route::post('/', [WebAnggotaController::class, 'store'])->name('anggota.store');
        Route::get('/create', [WebAnggotaController::class, 'create'])->name('anggota.create');
        Route::get('/edit/{id}', [WebAnggotaController::class, 'edit'])->name('anggota.edit');
        Route::post('/edit/{id}', [WebAnggotaController::class, 'update'])->name('anggota.update');
        Route::get('/delete/{id}', [WebAnggotaController::class, 'destroy'])->name('anggota.delete');
    });

    Route::prefix('/petugas')->group(function () {
        Route::get('/', [WebPetugasController::class, 'index'])->name('petugas.index');
        Route::post('/', [WebPetugasController::class, 'store'])->name('petugas.store');
        Route::get('/create', [WebPetugasController::class, 'create'])->name('petugas.create');
        Route::get('/edit/{id}', [WebPetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/edit/{id}', [WebPetugasController::class, 'update'])->name('petugas.update');
        Route::get('/delete/{id}', [WebPetugasController::class, 'destroy'])->name('petugas.delete');
    });

    Route::prefix('/pengarang')->group(function () {
        Route::get('/', [WebPengarangController::class, 'index'])->name('pengarang.index');
        Route::post('/', [WebPengarangController::class, 'store'])->name('pengarang.store');
        Route::get('/create', [WebPengarangController::class, 'create'])->name('pengarang.create');
        Route::get('/edit/{id}', [WebPengarangController::class, 'edit'])->name('pengarang.edit');
        Route::post('/edit/{id}', [WebPengarangController::class, 'update'])->name('pengarang.update');
        Route::get('/delete/{id}', [WebPengarangController::class, 'destroy'])->name('pengarang.delete');
    });

    Route::prefix('/penerbit')->group(function () {
        Route::get('/', [WebPenerbitController::class, 'index'])->name('penerbit.index');
        Route::post('/', [WebPenerbitController::class, 'store'])->name('penerbit.store');
        Route::get('/create', [WebPenerbitController::class, 'create'])->name('penerbit.create');
        Route::get('/edit/{id}', [WebPenerbitController::class, 'edit'])->name('penerbit.edit');
        Route::post('/edit/{id}', [WebPenerbitController::class, 'update'])->name('penerbit.update');
        Route::get('/delete/{id}', [WebPenerbitController::class, 'destroy'])->name('penerbit.delete');
    });
});
