<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
Route::get('/product', function () {
    return view('layouts.app');
});

//Route product
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/create', [ProductController::class, 'create'])->name('product_create');
Route::post('/product/store', [ProductController::class, 'store'])->name('store');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('update');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('delete');

//Route category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category_create');
Route::post('/category/store', [CategoryController::class,'store'])->name('storeCategory');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('editCategory');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('updateCategory');
Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('deleteCategory');

