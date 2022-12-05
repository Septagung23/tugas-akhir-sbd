<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
//LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
Route::get('/actionLogout', [LoginController::class, 'actionLogout'])->name('actionLogout');
//REGISTER 
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/actionRegister', [RegisterController::class, 'actionRegister'])->name('actionRegister');
//DETAIL
Route::get('/detail', [DetailController::class, 'index'])->name('detail.index');
Route::get('/search', [DetailController::class, 'search'])->name('detail.search');
//BARANG
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
Route::get('/barang/search', [BarangController::class, 'search'])->name('barang.search');
Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::post('/barang/soft-delete/{id}', [BarangController::class, 'softDelete'])->name('barang.softDelete');
Route::get('/barang/recycle', [BarangController::class, 'recycle'])->name('barang.recycle');
Route::post('/barang/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore');
Route::post('/barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');
//GUDANG
Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
Route::get('/gudang/search', [GudangController::class, 'search'])->name('gudang.search');
Route::get('/gudang/add', [GudangController::class, 'create'])->name('gudang.create');
Route::post('/gudang/store', [GudangController::class, 'store'])->name('gudang.store');
Route::get('/gudang/edit/{id}', [GudangController::class, 'edit'])->name('gudang.edit');
Route::post('/gudang/update/{id}', [GudangController::class, 'update'])->name('gudang.update');
Route::post('/gudang/soft-delete/{id}', [GudangController::class, 'softDelete'])->name('gudang.softDelete');
Route::get('/gudang/recycle', [GudangController::class, 'recycle'])->name('gudang.recycle');
Route::post('/gudang/restore/{id}', [GudangController::class, 'restore'])->name('gudang.restore');
Route::post('/gudang/delete/{id}', [GudangController::class, 'delete'])->name('gudang.delete');
//SUPPLIER
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/search', [SupplierController::class, 'search'])->name('supplier.search');
Route::get('/supplier/add', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::post('/supplier/soft-delete/{id}', [SupplierController::class, 'softDelete'])->name('supplier.softDelete');
Route::get('/supplier/recycle', [SupplierController::class, 'recycle'])->name('supplier.recycle');
Route::post('/supplier/restore/{id}', [SupplierController::class, 'restore'])->name('supplier.restore');
Route::post('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');










// Route::get('/', function () {
//     return view('welcome');
// });