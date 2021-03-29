<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/insert', [BookController::class, 'insert'])->name('insert');
Route::get('/delete', [BookController::class, 'delete'])->name('delete');
Route::post('/search', [BookController::class, 'search'])->name('search');
Route::get('/sort/{column}', [BookController::class, 'sort'])->name('sort');
