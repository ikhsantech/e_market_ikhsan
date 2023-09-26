<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;

route::get('/',[HomeController::class,'index']);
route::get('profile',[HomeController::class,'profile']);
route::get('contact',[HomeController::class,'contact']);
route::get('faq',[HomeController::class,'faq']);
route::get('dashboard',[HomeController::class,'dashboard']);
Route::resource('produk', ProdukController::class);
Route::resource('barang', BarangController::class);
Route::resource('pemasok', PemasokController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);
Route::resource('pembelian', PembelianController::class);

// pdf eksport
Route::get('download/pemasok', [PemasokController::class, 'downloadpdf'])->name('pdfpemasok');
Route::get('generate/produk', [ProdukController::class, 'downloadspdf'])->name('pdfproduk');

// excel eksport
Route::get('download/produk', [ProdukController::class, 'exportData'])->name('produk_export');

Route::post('produk/import',[ProdukController::class, 'importData'])->name('import');