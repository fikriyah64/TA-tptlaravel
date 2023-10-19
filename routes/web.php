<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/dashboard',[HomeController::class,'dashboard']);

//Route Input Data
Route::get('/user',[HomeController::class,'input_user']);
// Route::get('/klasifikasi',[HomeController::class,'input_klasifikasi']);
Route::get('/klasifikasi',[HomeController::class,'input_klasifikasi']);

Route::get('/create',[HomeController::class,'create'])->name('user.create');
Route::post('/store',[HomeController::class,'store'])->name('user.store');

Route::get('/edit/{id}',[HomeController::class,'edit'])->name('user.edit');
Route::put('/update/{id}',[HomeController::class,'update'])->name('user.update');
Route::delete('/delete/{id}',[HomeController::class,'delete'])->name('user.delete');