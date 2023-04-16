<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

// 検索機能
Route::get('/item_search', [App\Http\Controllers\ItemController::class, 'item_search'])->name('item_search');
// 編集画面を表示
Route::get('/item_showedit/{id}', [App\Http\Controllers\ItemController::class, 'item_showedit'])->name('item_showedit');
Route::post('/item_showedit/{id}', [App\Http\Controllers\ItemController::class, 'item_showedit'])->name('item_showedit');
// 編集機能
Route::post('/item_edit', [App\Http\Controllers\ItemController::class, 'item_edit'])->name('item_edit');
// 削除機能
Route::post('/item_destroy/{id}', [App\Http\Controllers\ItemController::class, 'item_destroy'])->name('item_destroy');
