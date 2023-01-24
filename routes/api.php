<?php

use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\BukusController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\PeminjamanDetailController;
use App\Http\Controllers\API\PenerbitController;
use App\Http\Controllers\API\PengarangController;
use App\Http\Controllers\API\PengembalianController;
use App\Http\Controllers\API\PengembalianDetailController;
use App\Http\Controllers\API\PetugasController;
use App\Http\Controllers\API\RakController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/petugas', [PetugasController::class, 'create']);
Route::get('/petugas', [PetugasController::class, 'index']);
Route::get('/petugas/{id}', [PetugasController::class, 'show']);

Route::post('/pengarang', [PengarangController::class, 'create']);
Route::get('/pengarang', [PengarangController::class, 'index']);
Route::get('/pengarang/{id}', [PengarangController::class, 'show']);

Route::post('/penerbit', [PenerbitController::class, 'create']);
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/{id}', [PenerbitController::class, 'show']);

Route::post('/rak', [RakController::class, 'create']);
Route::get('/rak', [RakController::class, 'index']);
Route::get('/rak/{id}', [RakController::class, 'show']);

Route::post('/buku', [BukusController::class, 'create']);
Route::get('/buku', [BukusController::class, 'index']);
Route::get('/buku/{id}', [BukusController::class, 'show']);
Route::post('/buku/update/{id}', [BukusController::class, 'update']);
Route::delete('/buku/{id}', [BukusController::class, 'delete']);

Route::post('/anggota', [AnggotaController::class, 'create']);
Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/{id}', [AnggotaController::class, 'show']);
Route::post('/anggota/update/{id}', [AnggotaController::class, 'update']);
Route::delete('/anggota/{id}', [AnggotaController::class, 'delete']);

Route::post('/peminjaman', [PeminjamanController::class, 'create']);
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show']);

Route::post('/peminjamandetail', [PeminjamanDetailController::class, 'create']);
Route::get('/peminjamandetail', [PeminjamanDetailController::class, 'index']);
Route::get('/peminjamandetail/{id}', [PeminjamanDetailController::class, 'show']);

Route::post('/pengembalian', [PengembalianController::class, 'create']);
Route::get('/pengembalian', [PengembalianController::class, 'index']);
Route::get('/pengembalian/{id}', [PengembalianController::class, 'show']);

Route::post('/pengembaliandetail', [PengembalianDetailController::class, 'create']);
Route::get('/pengembaliandetail', [PengembalianDetailController::class, 'index']);
Route::get('/pengembaliandetail/{id}', [PengembalianDetailController::class, 'show']);