<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;






Route::get('',[HomeController::class,'index'])->name('home'); 


Route::get('product.index',[ProductController::class,'index'])->name('product.index')->middleware(AuthMiddleware::class); 
Route::get('ajoute',[ProductController::class,'ajoute'])->name('ajoute')->middleware(AuthMiddleware::class);
Route::get('index/update/{id}',[ProductController::class,'update'])->name('index.update')->middleware(AuthMiddleware::class); 
Route::put('index/edit/{id}',[ProductController::class,'edit'])->name('index.edit')->middleware(AuthMiddleware::class); 
Route::post('index',[ProductController::class,'store'])->name('index.store')->middleware(AuthMiddleware::class);  
Route::delete('index/{id}',[ProductController::class,'destroy'])->name('index.destroy')->middleware(AuthMiddleware::class);

Route::get('login',[AuthController::class , 'login'])->name('auth.login');
//Route::post('PLogin',[AuthController::class , 'PLogin'])->name('PLogin');
Route::post('PLogin',[AuthController::class , 'Plogin'])->name('auth.PLogin');
Route::delete('logout',[AuthController::class , 'logout'])->name('auth.logout');

Route::get('insc',[AuthController::class , 'insc'])->name('auth.insc');
Route::post('inscrire',[AuthController::class , 'inscrire'])->name('auth.inscrire');









Route::get('cat', [CategoryController::class, 'index'])->name('categories.index')->middleware(AuthMiddleware::class);
Route::delete('categories.destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware(AuthMiddleware::class);
Route::get('add', [CategoryController::class, 'create'])->name('categories.create')->middleware(AuthMiddleware::class);
Route::post('cat', [CategoryController::class, 'store'])->name('cat.save')->middleware(AuthMiddleware::class);
Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit')->middleware(AuthMiddleware::class);
Route::put('categories.update/{id}', [CategoryController::class, 'update'])->name('categories.update')->middleware(AuthMiddleware::class);
Route::get('cat/{id}', [CategoryController::class, 'show'])->name('categories.show')->middleware(AuthMiddleware::class);




Route::resource('/client',ClientController::class)->middleware(AuthMiddleware::class);
Route::get('/command',[CommandController::class,'index'])->name('commands.index')->middleware(AuthMiddleware::class);

Route::get('/commands/{id}/edit', [CommandController::class, 'edit'])->name('commands.edit')->middleware(AuthMiddleware::class);
Route::put('/commands/{id}/update', [CommandController::class, 'update'])->name('command.update')->middleware(AuthMiddleware::class);

Route::get('/commands/{command}/show', [CommandController::class, 'show'])->name('commands.show')->middleware(AuthMiddleware::class);

Route::delete('/commands/{id}', [CommandController::class, 'destroy'])->name('commands.destroy')->middleware(AuthMiddleware::class);

