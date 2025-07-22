<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\TrackingPacketController;
use App\Http\Controllers\User\DetailProdukController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\DaftarPesananController;
use App\Http\Controllers\Seller\DaftarProdukController;
use App\Http\Controllers\Seller\EditProdukController;
use App\Http\Controllers\Seller\ProdukController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\MetodePembayaranController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\PesananController;
use App\Http\Controllers\User\ProfileUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusatBantuanController;
use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\Admin\AdminAkomodasiController;
use App\Http\Controllers\AdminAuthController;

Route::post('/profile/location/update', [App\Http\Controllers\LocationController::class, 'update'])->name('user.location.update');
// Add this to your routes/web.php file
Route::get('/edit-toko', [App\Http\Controllers\TokoController::class, 'edit'])->name('edit.toko');
Route::post('/update-toko', [App\Http\Controllers\TokoController::class, 'update'])->name('update.toko');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/akomodasi', [AdminAkomodasiController::class, 'index'])->name('admin.akomodasi.index');
    Route::get('/akomodasi/create', [AdminAkomodasiController::class, 'create'])->name('admin.akomodasi.create');
    Route::post('/akomodasi', [AdminAkomodasiController::class, 'store'])->name('admin.akomodasi.store');
    Route::get('/akomodasi/{id}/edit', [AdminAkomodasiController::class, 'edit'])->name('admin.akomodasi.edit');
    Route::put('/akomodasi/{id}', [AdminAkomodasiController::class, 'update'])->name('admin.akomodasi.update');
    Route::delete('/akomodasi/{id}', [AdminAkomodasiController::class, 'destroy'])->name('admin.akomodasi.destroy');
});


Route::get('/akomodasi', [AkomodasiController::class, 'index'])->name('akomodasi.index');
Route::get('/akomodasi/{id}/detail', [AkomodasiController::class, 'detail'])->name('akomodasi.detail');
Route::get('/akomodasi/{id}/pembayaran', [AkomodasiController::class, 'pembayaran'])->name('akomodasi.pembayaran');

Route::get('/pusat-bantuan', [PusatBantuanController::class, 'index'])->name('pusat-bantuan.index');



Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');
Route::get('/home', [HomeController::class, 'index']);
// Rute untuk register seller (hanya untuk guest)
Route::get('/register-seller', [RegisteredUserController::class, 'createSeller'])->name('register.seller');
Route::post('/register-store', [RegisteredUserController::class, 'storeSeller'])->name('register.seller.store');

// Rute untuk login dan register (hanya untuk guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');
});

Route::middleware(['auth', 'role:seller'])->group(function () {
    // Bagian Seller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('seller.dashboard');

    Route::get('/tambah-produk', [ProdukController::class, 'create'])->name('seller.tambahProduk');
    Route::post('/store-produk', [ProdukController::class, 'store'])->name('seller.storeProduk');

    Route::get('/daftar-produk', [DaftarProdukController::class, 'index'])->name('seller.daftarProduk');
    Route::get('/edit-produk/{id}', [EditProdukController::class, 'edit'])->name('seller.editProduk');
    Route::put('/update-produk/{id}', [EditProdukController::class, 'update'])->name('seller.updateProduk');
    Route::delete('/delete-produk/{id}', [EditProdukController::class, 'destroy'])->name('seller.deleteProduk');

    Route::get('/seller/daftar-pesanan', [DaftarPesananController::class, 'index'])->name('seller.daftarPesanan');
    Route::post('/update-status/{id}', [DaftarPesananController::class, 'updateStatus'])->name('update.status.pesanan');
    
});

Route::middleware(['auth', 'role:user'])->group(function() {
    // Bagian User
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/produk/{id}', [DetailProdukController::class, 'show'])->name('produk.show');

    Route::post('/keranjang/tambah/{produk}', [KeranjangController::class, 'tambahKeranjang'])->name('user.tambahKeranjang');
    Route::post('/keranjang/{produkId}', [KeranjangController::class, 'addToKeranjang'])->name('user.tambahKeranjang');
    Route::get('/keranjang', [KeranjangController::class, 'viewKeranjang'])->name('keranjang.view');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'hapusKeranjang'])->name('hapus.keranjang');
    Route::post('/keranjang/update/{id}', [KeranjangController::class, 'updateJumlah'])->name('update.keranjang');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/direct', [CheckoutController::class, 'directCheckout'])->name('checkout.direct');
    Route::get('/checkout/metodePembayaran', [MetodePembayaranController::class, 'index'])->name('checkout.payment');
    Route::post('/checkout/process-metodePembayaran', [MetodePembayaranController::class, 'processOrder'])->name('checkout.processOrder');

    Route::get('/payment/{id}', [PaymentController::class, 'payment'])->name('user.payment.payment');
    Route::post('/process-order', [PaymentController::class, 'processOrder'])->name('checkout.processOrder');
    Route::put('/user/payment/status/{payment}', [PaymentController::class, 'updatePaymentStatus']);
    Route::post('/update-payment-status/{orderId}', [PesananController::class, 'updatePaymentStatus'])->name('user.updatePaymentStatus');
    Route::post('/update-package/{id}', [PesananController::class, 'updatePackage'])->name('user.updatePackage');
    
    Route::get('/user/tracking', [TrackingPacketController::class, 'index'])->name('user.tracking');

    Route::get('/user/pesanan', [PesananController::class, 'index'])->name('user.pesanan');
    Route::get('/product/buy-again/{orderId}', [ProdukController::class, 'buyAgain'])->name('user.product.buyAgain');

    Route::get('/profileUser', [ProfileUserController::class, 'showProfile'])->name('user.profile');
    Route::post('/profileUser/update', [ProfileUserController::class, 'updateProfile'])->name('user.profile.update');
});

// Rute untuk logout (hanya untuk pengguna yang sudah login)
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__ . '/auth.php';
