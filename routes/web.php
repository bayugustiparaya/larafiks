<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;

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
    return view('index');
})->name('index');

// group untuk product
Route::prefix('product')->group(function(){
    // menampilkan view product index
    Route::get('/', [ProductController::class, 'index'])->name('product.index');

    // menampilkan view product add / form 
    Route::get('/add', [ProductController::class, 'addIndex'])->name('product.add.index');

    // menjalankan proses add product
    Route::post('/add', [ProductController::class, 'add'])->name('product.add');

    // menampilkan view product update / form update
    Route::get('/update/{id}', [ProductController::class, 'updateIndex'])->name('product.update.index');

    // menjalankan proses update product
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');

    // menjalankan proses delete product
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
});

// group untuk order
Route::prefix('order')->group(function(){
    // menampilkan view order index
    Route::get('/', [orderController::class, 'index'])->name('order.index');

    // menampilkan view order add / form 
    Route::get('/add/{id}', [orderController::class, 'addIndex'])->name('order.add.index');

    // menjalankan proses add order
    Route::post('/add', [orderController::class, 'add'])->name('order.add');
});

// route untuk history
Route::get('history', [HistoryController::class, 'index'])->name('history.index');