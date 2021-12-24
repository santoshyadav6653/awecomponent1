<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

//route for index
Route::get('/', [ProductController::class, 'index'])->name('home');
//route for add
Route::post('create', [ProductController::class, 'create'])->name('create');
Route::post('store', [ProductController::class, 'store'])->name('store');
//route for edit
Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::patch('update/{id}', [ProductController::class, 'update'])->name('update');
//route for delete
Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('delete');
 