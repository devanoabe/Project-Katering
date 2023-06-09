<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;


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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/beranda', [UserController::class, 'dashboard'])->name('admin.beranda');
    // Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::resource('kategori', KategoriController::class);
    Route::get('/produk/exportPDF', [ProdukController::class, 'exportPDF'])->name('exportPDF');
    Route::resource('produk', ProdukController::class);
    Route::match(['get','post'],'/laporan', [PesananController::class, 'laporan'])->name('laporan');
    Route::match(['get','post'],'/exportPDF', [PesananController::class, 'cetakPDF'])->name('cetakPDF');
});

Route::get('/home', [HomeController::class, 'index'])->name('home.user');
Route::get('/welcome', [HomeController::class, 'welcome'])->name('home.welcome');
Route::get('/catering', [PesananController::class, 'catering'])->name('home.catering');
Route::resource('pesanan', PesananController::class);
Route::post('/updateStatus/{idPesanan}', [PesananController::class, 'updateStatus'])->name('pesanan.updateStatus');
Route::get('/catering', [HomeController::class, 'catering'])->name('home.catering');
Route::get('/status', [HomeController::class, 'status'])->name('home.status');
Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('home.riwayat');



//User Route
// Route::middleware(['auth','user-role:user'])->group(function()
// {
//     Route::get('/user/home',[HomeController::class, 'userHome'])->name('home.user');
// });

//Admin Route
// Route::middleware(['auth','user-role:admin'])->group(function()
// {
//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('home.admin');
// });