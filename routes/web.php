<?php

use App\Models\Supplier;
use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StokBarangController;
use App\Http\Controllers\TenagaKerjaController;
use App\Http\Controllers\StokProduksiController;
use App\Http\Controllers\BiayaProduksiController;
use App\Http\Controllers\KategoriBarangController;

// use App\Http\Controllers\Controller\DashboardController;

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


Route::get('/register', 'LoginController@register')->name('register');

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//auth login
// Route::group(['middleware' => ['auth']], function () {
//     // dashboard page
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('data-supplier');
Route::get('/supplier/tambah-supplier', [SupplierController::class, 'create'])->name('tambah-supplier');
Route::post('/supplier/simpan-supplier', [SupplierController::class, 'store'])->name('simpan-supplier');
Route::get('/supplier/edit-supplier/{id}', [SupplierController::class, 'edit'])->name('edit-supplier');
Route::post('/supplier/update-supplier/{id}', [SupplierController::class, 'update'])->name('update-supplier');
Route::get('/supplier/delete-supplier/{id}', [SupplierController::class, 'destroy'])->name('delete-supplier');

//bahan baku
Route::get('/bahan-baku', [BahanBakuController::class, 'index'])->name('data-bahan');
Route::get('/bahan-baku/tambah-bahan', [BahanBakuController::class, 'create'])->name('tambah-bahan');
Route::post('/bahan-baku/simpan-bahan', [BahanBakuController::class, 'store'])->name('simpan-bahan');
Route::get('/bahan-baku/edit-bahan/{bahanbaku}', [BahanBakuController::class, 'edit'])->name('edit-bahan');
Route::post('/bahan-baku/update-bahan/{bahanbaku}', [BahanBakuController::class, 'update'])->name('update-bahan');
Route::get('/bahan-baku/delete-bahan/{bahanbaku}', [BahanBakuController::class, 'destroy'])->name('delete-bahan');

//produksi
Route::get('/produksi', [ProduksiController::class, 'index'])->name('data-produksi');
Route::get('/produksi/tambah-produksi', [ProduksiController::class, 'create'])->name('tambah-produksi');
Route::post('/produksi/simpan-produksi', [ProduksiController::class, 'store'])->name('simpan-produksi');
Route::get('/produksi/edit-produksi/{id}', [ProduksiController::class, 'edit'])->name('edit-produksi');
Route::post('/produksi/update-produksi/{id}', [ProduksiController::class, 'update'])->name('update-produksi');
Route::get('/produksi/delete-produksi/{id}', [ProduksiController::class, 'destroy'])->name('delete-produksi');

//stok produksi
Route::get('/stok-produksi', [StokProduksiController::class, 'index'])->name('stok-produksi');
Route::get('/stok-produksi/tambah-stok-produksi', [StokProduksiController::class, 'create'])->name('tambah-stokproduksi');
Route::post('/stok-produksi/simpan-stok-produksi', [StokProduksiController::class, 'store'])->name('simpan-stokproduksi');
Route::get('/stok-produksi/edit-stok-produksi/{id}', [StokProduksiController::class, 'edit'])->name('edit-stokproduksi');
Route::post('/stok-produksi/update-stok-produksi/{id}', [StokProduksiController::class, 'update'])->name('update-stokproduksi');
Route::get('/stok-produksi/delete-stok-produksi/{id}', [StokProduksiController::class, 'destroy'])->name('delete-stokproduksi');

//biaya produksi
Route::get('/biaya-produksi', [BiayaProduksiController::class, 'index'])->name('biaya-produksi');
Route::get('/biaya-produksi/tambah-biaya-produksi', [BiayaProduksiController::class, 'create'])->name('tambah-biaya');
Route::post('/biaya-produksi/simpan-biaya-produksi', [BiayaProduksiController::class, 'store'])->name('simpan-biaya');
Route::get('/biaya-produksi/edit-biaya-produksi/{id}', [BiayaProduksiController::class, 'edit'])->name('edit-biaya');
Route::post('/biaya-produksi/update-biaya-produksi/{id}', [BiayaProduksiController::class, 'update'])->name('update-biaya');
Route::get('/biaya-produksi/delete-biaya-produksi/{id}', [BiayaProduksiController::class, 'destroy'])->name('delete-biaya');

//barang
Route::get('/barang', [BarangController::class, 'index'])->name('data-barang');
Route::get('/barang/tambah-barang', [BarangController::class, 'create'])->name('tambah-barang');
Route::post('/barang/simpan-barang', [BarangController::class, 'store'])->name('simpan-barang');
Route::get('/barang/edit-barang/{id}', [BarangController::class, 'edit'])->name('edit-barang');
Route::post('/barang/update-barang/{id}', [BarangController::class, 'update'])->name('update-barang');
Route::get('/barang/delete-barang/{id}', [BarangController::class, 'destroy'])->name('delete-barang');

//stok barang
Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stok-barang');
Route::get('/stok-barang/tambah-stok-barang', [StokBarangController::class, 'create'])->name('tambah-stokbarang');
Route::post('/stok-barang/simpan-stok-barang', [StokBarangController::class, 'store'])->name('simpan-stokbarang');
Route::get('/stok-barang/edit-stok-barang/{id}', [StokBarangController::class, 'edit'])->name('edit-stokbarang');
Route::post('/stok-barang/update-stok-barang/{id}', [StokBarangController::class, 'update'])->name('update-stokbarang');
Route::get('/stok-barang/delete-stok-barang/{id}', [StokBarangController::class, 'destroy'])->name('delete-stokbarang');

//kategori barang
Route::get('/kategori-barang', [KategoriBarangController::class, 'index'])->name('kategori-barang');
Route::get('/kategori-barang/tambah-kategori-barang', [KategoriBarangController::class, 'create'])->name('tambah-kategori');
Route::post('/kategori-barang/simpan-kategori-barang', [KategoriBarangController::class, 'store'])->name('simpan-kategori');
Route::get('/kategori-barang/edit-kategori-barang/{id}', [KategoriBarangController::class, 'edit'])->name('edit-kategori');
Route::post('/kategori-barang/update-kategori-barang/{id}', [KategoriBarangController::class, 'update'])->name('update-kategori');
Route::get('/kategori-barang/delete-kategori-barang/{id}', [KategoriBarangController::class, 'destroy'])->name('delete-kategori');

//gudang
Route::get('/gudang', [GudangController::class, 'index'])->name('data-gudang');
Route::get('/gudang/tambah-gudang', [GudangController::class, 'create'])->name('tambah-gudang');
Route::post('/gudang/simpan-gudang', [GudangController::class, 'store'])->name('simpan-gudang');
Route::get('/gudang/edit-gudang/{id}', [GudangController::class, 'edit'])->name('edit-gudang');
Route::post('/gudang/update-gudang/{id}', [GudangController::class, 'update'])->name('update-gudang');
Route::get('/gudang/delete-gudang/{id}', [GudangController::class, 'destroy'])->name('delete-gudang');

//outlet
Route::get('/outlet', [OutletController::class, 'index'])->name('data-outlet');
Route::get('/outlet/tambah-outlet', [OutletController::class, 'create'])->name('tambah-outlet');
Route::post('/outlet/simpan-outlet', [OutletController::class, 'store'])->name('simpan-outlet');
Route::get('/outlet/edit-outlet/{id}', [OutletController::class, 'edit'])->name('edit-outlet');
Route::post('/outlet/update-outlet/{id}', [OutletController::class, 'update'])->name('update-outlet');
Route::get('/outlet/delete-outlet/{id}', [OutletController::class, 'destroy'])->name('delete-outlet');

//pegawai
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('data-pegawai');
Route::get('/pegawai/tambah-pegawai', [PegawaiController::class, 'create'])->name('tambah-pegawai');
Route::post('/pegawai/simpan-pegawai', [PegawaiController::class, 'store'])->name('simpan-pegawai');
Route::get('/pegawai/edit-pegawai/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai');
Route::post('/pegawai/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update-pegawai');
Route::get('/pegawai/delete-pegawai/{id}', [PegawaiController::class, 'destroy'])->name('delete-pegawai');

//tenaga kerja
Route::get('/tenaga-kerja', [TenagaKerjaController::class, 'index'])->name('tenaga-kerja');
Route::get('/tenaga-kerja/tambah-tenaga-kerja', [TenagaKerjaController::class, 'create'])->name('tambah-tenaga');
Route::post('/tenaga-kerja/simpan-tenaga-kerja', [TenagaKerjaController::class, 'store'])->name('simpan-tenaga');
Route::get('/tenaga-kerja/edit-tenaga-kerja/{id}', [TenagaKerjaController::class, 'edit'])->name('edit-tenaga');
Route::post('/tenaga-kerja/update-tenaga-kerja/{id}', [TenagaKerjaController::class, 'update'])->name('update-tenaga');
Route::get('/tenaga-kerja/delete-tenaga-kerja/{id}', [TenagaKerjaController::class, 'destroy'])->name('delete-tenaga');

//pengguna
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('user');
Route::get('/pengguna/tambah-pengguna', [PenggunaController::class, 'create'])->name('tambah-user');
Route::post('/pengguna/simpan-pengguna', [PenggunaController::class, 'store'])->name('simpan-user');
Route::get('/pengguna/edit-pengguna/{id}', [PenggunaController::class, 'edit'])->name('edit-user');
Route::post('/pengguna/update-pengguna/{id}', [PenggunaController::class, 'update'])->name('update-user');
Route::get('/pengguna/delete-pengguna/{id}', [PenggunaController::class, 'destroy'])->name('delete-user');

//export PDF
Route::get('/print-supplier', [SupplierController::class, 'print']);
Route::get('/print-bahan-baku', [BahanBakuController::class, 'print']);
Route::get('/print-produksi', [ProduksiController::class, 'print']);
Route::get('/print-stok-produksi', [StokProduksiController::class, 'print']);
Route::get('/print-biaya-produksi', [BiayaProduksiController::class, 'print']);
Route::get('/print-barang', [BarangController::class, 'print']);
Route::get('/print-stok-barang', [StokBarangController::class, 'print']);
Route::get('/print-gudang', [GudangController::class, 'print']);
Route::get('/print-outlet', [OutletController::class, 'print']);
Route::get('/print-pegawai', [PegawaiController::class, 'print']);
Route::get('/print-tenaga-kerja', [TenagaKerjaController::class, 'print']);
