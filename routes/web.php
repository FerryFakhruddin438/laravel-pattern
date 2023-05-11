<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [UserController::class, 'login'])->name('login');
Route::post('login', [UserController::class, 'storeLogin'])->name('login.store');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::post('books', [BookController::class, 'create'])->name('books.create');
    Route::post('books/{id}/update', [BookController::class, 'update'])->name('books.update');
    Route::get('books/{id}/delete', [BookController::class, 'delete'])->name('books.delete');
});
