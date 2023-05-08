<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('home');
});

Route::resource('/items',ItemController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/items/{id}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/items/user', [ItemController::class, 'userPost'])->name('items.userPost');

    
});



Route::middleware(['auth'])->group(function () {
    Route::get('/items/user', [ItemController::class, 'userPost'])->name('items.userPost');
});



Route::resource('/login', LoginController::class, );

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');


