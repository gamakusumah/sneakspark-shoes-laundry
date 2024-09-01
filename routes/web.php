<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\TransaksiController;
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

/*
|--------------------------------------------------------------------------
| Administrator Setting Routes
|--------------------------------------------------------------------------
*/

Route::get('/administrator', [AdminController::class, 'akses'])->name('administrator')->middleware('guest');
Route::post('/akses_admin', [AdminController::class, 'authenticate']);
Route::post('/logout', [AdminController::class, 'logout']);

Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth:admin');
/*
|--------------------------------------------------------------------------
| Referensi Routes
|--------------------------------------------------------------------------
*/

// Pelanggan Routes
Route::get('/pelanggan', [ReferensiController::class, 'indexPelanggan']);
Route::get('/pelanggan/ubah/{id}', [ReferensiController::class, 'ubahPelanggan']);

// Pelayanan Routes
Route::get('/pelayanan', [ReferensiController::class, 'indexPelayanan']);
Route::get('/pelayanan/ubah/{id}', [ReferensiController::class, 'ubahPelayanan']);

// Pegawai Routes
Route::get('/pegawai', [ReferensiController::class, 'indexPegawai'])->name('pegawai')->middleware('auth:admin');
Route::get('/ubahPegawai/{id}', [ReferensiController::class, 'ubahPegawai'])->name('ubahPegawai')->middleware('auth:admin');

Route::post('/cPegawai', [ReferensiController::class, 'storePegawai']);
Route::post('/uPegawai', [ReferensiController::class, 'updatePegawai']);
Route::post('/uPasswordPegawai', [ReferensiController::class, 'updatePasswordPegawai']);
Route::get('/dPegawai/{id}', [ReferensiController::class, 'destroyPegawai']);


/*
|--------------------------------------------------------------------------
| Transaksi Routes
|--------------------------------------------------------------------------
*/

// Pesanan Routes
Route::get('/pesanan', [TransaksiController::class, 'indexPesanan']);
Route::get('/pesanan/tambah', [TransaksiController::class, 'tambahPesanan']);
Route::get('/pesanan/ubah/{id}', [TransaksiController::class, 'ubahPesanan']);
