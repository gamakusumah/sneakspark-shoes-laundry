<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReferensiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ExportController;
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
Route::get('/pelanggan', [ReferensiController::class, 'indexPelanggan'])->name('pelanggan')->middleware('auth:admin');
Route::get('/pelanggan/ubah/{id}', [ReferensiController::class, 'ubahPelanggan'])->name('ubahPelanggan')->middleware('auth:admin');

// Pelayanan Routes
Route::get('/pelayanan', [ReferensiController::class, 'indexPelayanan'])->name('layanan')->middleware('auth:admin');
Route::get('/ubahLayanan/{id}', [ReferensiController::class, 'ubahPelayanan'])->name('ubahLayanan')->middleware('auth:admin');
Route::post('/cLayanan', [ReferensiController::class, 'storeLayanan']);
Route::get('/dLayanan/{id}', [ReferensiController::class, 'destroyLayanan']);
Route::post('/uLayanan', [ReferensiController::class, 'updateLayanan']);

// Kategori
Route::get('/kategori', [ReferensiController::class, 'indexKategori'])->name('kategori')->middleware('auth:admin');
Route::post('/cKategori', [ReferensiController::class, 'storeKategori']);
Route::get('/dKategori/{id}', [ReferensiController::class, 'destroyKategori']);
Route::get('/ubahKategori/{id}', [ReferensiController::class, 'ubahKategori'])->name('ubahKategori')->middleware('auth:admin');
Route::post('/uKategori', [ReferensiController::class, 'updateKategori']);

// vocher
Route::get('/vocher', [ReferensiController::class, 'indexVocher'])->name('vocher')->middleware('auth:admin');
Route::get('/ubahVocher/{id}', [ReferensiController::class, 'showVocher'])->name('ubahVocher')->middleware('auth:admin');
Route::post('/cVocher', [ReferensiController::class, 'storeVocher']);
Route::post('/uVocher', [ReferensiController::class, 'updateVocher']);

// Pegawai Routes
Route::get('/pegawai', [ReferensiController::class, 'indexPegawai'])->name('pegawai')->middleware('auth:admin');
Route::get('/ubahPegawai/{id}', [ReferensiController::class, 'ubahPegawai'])->name('ubahPegawai')->middleware('auth:admin');

Route::get('/pegawai/profil', [ReferensiController::class, 'profilPegawai'])->name('profilPegawai')->middleware('auth:admin');
Route::get('/ubahMyProfile', [ReferensiController::class, 'ubahProfilPegawai'])->name('ubahProfilPegawai')->middleware('auth:admin');
Route::get('/pegawai/profil/password/{id}', [ReferensiController::class, 'ubahPasswordPegawai'])->name('ubahPasswordPegawai')->middleware('auth:admin');

Route::post('/cPegawai', [ReferensiController::class, 'storePegawai']);
Route::post('/uPegawai', [ReferensiController::class, 'updatePegawai']);
Route::post('/uPasswordPegawai', [ReferensiController::class, 'updatePasswordPegawai']);
Route::get('/dPegawai/{id}', [ReferensiController::class, 'destroyPegawai']);

// Export Routes
Route::get('/export/faktur', [ExportController::class, 'indexFaktur']);
Route::get('/export/email', [ExportController::class, 'indexEmail']);
Route::get('/export/laporan', [ExportController::class, 'indexLaporan']);


/*
|--------------------------------------------------------------------------
| Transaksi Routes
|--------------------------------------------------------------------------
*/

// Pesanan Routes
Route::get('/pesanan', [TransaksiController::class, 'indexPesanan'])->name('pesanan')->middleware('auth:admin');
Route::get('/pesananKondisi/{kondisi}', [TransaksiController::class, 'indexPesananKondisi'])->name('pesananKondisi')->middleware('auth:admin');
Route::get('/addPesanan', [TransaksiController::class, 'tambahPesanan'])->name('addPesanan')->middleware('auth:admin');
Route::get('/showPesanan/{id}', [TransaksiController::class, 'showPesanan'])->name('showPesanan')->middleware('auth:admin');
Route::get('/pesananDetail/{id}', [TransaksiController::class, 'pesananDetail'])->name('pesananDetail')->middleware('auth:admin');

Route::get('/pesanan/ubah/{id}', [TransaksiController::class, 'ubahPesanan'])->name('PesananUbah')->middleware('auth:admin');
Route::get('/pembayaranAdmin/{id}', [TransaksiController::class, 'showPembayaran'])->name('pembayaranAdmin')->middleware('auth:admin');

Route::post('/keranjangAdmin', [TransaksiController::class, 'storeKeranjang']);
Route::get('/dKeranjang/{id}/{idPemesan}', [TransaksiController::class, 'destroyKeranjang']);
Route::post('/prosesPesanan', [TransaksiController::class, 'prosesPesananAdmin']);
Route::post('/cekVocher', [TransaksiController::class, 'cekVocher']);
Route::post('/strukAdmin', [TransaksiController::class, 'strukAdmin']);

Route::post('/prosesTransaksi', [TransaksiController::class, 'prosesTransaksi']);

Route::get('/struk/{id}', [TransaksiController::class, 'fakturPesanan'])->name('struk')->middleware('auth:admin');
Route::get('/laporan', [TransaksiController::class, 'laporan'])->name('laporan')->middleware('auth:admin');
Route::post('/search', [TransaksiController::class, 'search']);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::get('/', [UserController::class, 'index']);
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/daftar', [AuthController::class, 'register'])->name('daftar')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::post('/logoutUser', [AuthController::class, 'logout']);


// Order Routes
Route::get('/pesan', [OrderController::class, 'checkout'])->name('pesan')->middleware('auth:web');
Route::get('/pembayaran/{id}', [OrderController::class, 'pembayaran'])->name('pembayaran')->middleware('auth:web');

Route::post('/keranjangUser', [OrderController::class, 'stoareKeranjang']);
Route::get('/dKeranjang/{id}', [OrderController::class, 'destroyKeranjang']);
Route::post('/cekVocherUser', [OrderController::class, 'cekVocher']);
Route::post('/prosesPesananUser', [OrderController::class, 'prosesPesanan']);
Route::post('/pembayaranUser', [OrderController::class, 'pembayaranUser']);

// Profile Routes
Route::get('/profil', [ProfilController::class, 'profil'])->name('profile')->middleware('auth:web');
Route::get('/profil/ubah', [ProfilController::class, 'ubahProfil'])->name('ubahProfile')->middleware('auth:web');
Route::get('/profil/ubah-password', [ProfilController::class, 'ubahPassword'])->name('ubahPassword')->middleware('auth:web');
Route::get('/riwayat', [ProfilController::class, 'riwayatPesanan'])->name('riwayat')->middleware('auth:web');

Route::post('/uProfile', [AuthController::class, 'updateProfile']);
Route::post('/changePassword', [AuthController::class, 'updatePassword']);