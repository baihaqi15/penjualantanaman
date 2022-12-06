<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\penjualanController;
use App\Http\Controllers\tanamanController;
use App\Http\Controllers\tokoController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::get('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/', [homeController::class, 'index'])->name('home.index');

Route::get('/toko/add', [tokoController::class, 'create'])->name('toko.create');
Route::post('/toko/store', [tokoController::class, 'store'])->name('toko.store');
Route::get('/toko', [tokoController::class, 'index'])->name('toko.index');
Route::get('/toko/edit/{id}', [tokoController::class, 'edit'])->name('toko.edit');
Route::post('/toko/update/{id}', [tokoController::class, 'update'])->name('toko.update');
Route::post('/toko/delete/{id}', [tokoController::class, 'delete'])->name('toko.delete');
Route::get('/toko/search', [tokoController::class, 'search'])->name('toko.search');
Route::get('/toko/hide/{id}', [tokoController::class, 'hide'])->name('toko.hide');
Route::get('/toko/trash', [tokoController::class, 'trash'])->name('toko.trash');
Route::get('/toko/restore/{id}', [tokoController::class, 'restore'])->name('toko.restore');
Route::get('/toko/search/trash', [tokoController::class, 'search_trash'])->name('toko.search_trash');

Route::get('/penjualan/add', [penjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/store', [penjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan', [penjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/edit/{id}', [penjualanController::class, 'edit'])->name('penjualan.edit');
Route::post('/penjualan/update/{id}', [penjualanController::class, 'update'])->name('penjualan.update');
Route::post('/penjualan/delete/{id}', [penjualanController::class, 'delete'])->name('penjualan.delete');
Route::get('/penjualan/search', [penjualanController::class, 'search'])->name('penjualan.search');
Route::post('/penjualan/hide/{id}', [penjualanController::class, 'hide'])->name('penjualan.hide');
Route::get('/penjualan/trash', [penjualanController::class, 'trash'])->name('penjualan.trash');
Route::get('/penjualan/restore/{id}', [penjualanController::class, 'restore'])->name('penjualan.restore');
Route::get('/penjualan/search/trash', [penjualanController::class, 'search_trash'])->name('penjualan.search_trash');

Route::get('/tanaman/add', [tanamanController::class, 'create'])->name('tanaman.create');
Route::post('/tanaman/store', [tanamanController::class, 'store'])->name('tanaman.store');
Route::get('/tanaman', [tanamanController::class, 'index'])->name('tanaman.index');
Route::get('/tanaman/edit/{id}', [tanamanController::class, 'edit'])->name('tanaman.edit');
Route::post('/tanaman/update/{id}', [tanamanController::class, 'update'])->name('tanaman.update');
Route::post('/tanaman/delete/{id}', [tanamanController::class, 'delete'])->name('tanaman.delete');
Route::get('/tanaman/search', [tanamanController::class, 'search'])->name('tanaman.search');
Route::get('/tanaman/hide/{id}', [tanamanController::class, 'hide'])->name('tanaman.hide');
Route::get('/tanaman/trash', [tanamanController::class, 'trash'])->name('tanaman.trash');
Route::get('/tanaman/restore/{id}', [tanamanController::class, 'restore'])->name('tanaman.restore');
Route::get('/tanaman/search/trash', [tanamanController::class, 'search_trash'])->name('tanaman.search_trash');

