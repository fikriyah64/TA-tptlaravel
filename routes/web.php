<?php

use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Input_PendudukController;
use App\Http\Controllers\KlasifikasiController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//Route Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

//Route Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

//Route Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');

//Route Input Data User
Route::get('/create/user', [HomeController::class, 'create'])->name('user.create')->middleware('auth');

//Route Lihat Data User
Route::get('/user', [HomeController::class, 'input_user'])->name('input_user')->middleware('auth');

//Route Edit Data User
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit')->middleware('auth');

//Route Update Data User
Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update')->middleware('auth');

//Route Hapus Data User
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete')->middleware('auth');

Route::post('/store', [HomeController::class, 'store'])->name('user.store');

//Route Input Data Penduduk dan buat klasifikasi
Route::get('/create/penduduk', [Input_PendudukController::class, 'create'])->name('penduduk.create')->middleware('auth');

//Route Lihat Data Klasifikasi
Route::get('/klasifikasi', [KlasifikasiController::class, 'view_klasifikasi'])->middleware('auth');

//Route Tambah Klasifikasi
Route::post('/proses_klasifikasi', [KlasifikasiController::class, 'proses_klasifikasi'])->name('proses_klasifikasi')->middleware('auth');

//Route Hapus Klasifikasi
Route::delete('/delete_klasifikasi/{id}', [KlasifikasiController::class, 'delete_klasifikasi'])->name('delete_klasifikasi')->middleware('auth');

//Route Upload Excell
Route::post('/import/excel', [ExcelImportController::class, 'importExcel'])->name('import.excel');
