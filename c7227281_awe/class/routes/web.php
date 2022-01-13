<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $book = Book::all();

    return view('welcome')
    ->with('book',$book)

    ;
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::get('delete/{id}',[App\Http\Controllers\HomeController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[App\Http\Controllers\HomeController::class,'showData']);
Route::post('edit',[App\Http\Controllers\HomeController::class,'update']);
