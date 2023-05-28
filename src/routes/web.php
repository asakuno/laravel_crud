<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\CommentController;
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
    return view('tops.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/shops', [ShopController::class, 'index'])->name('shops.index');
Route::get('/shops/map', [ShopController::class, 'map'])->name('shops.map');
Route::get('/shops/{shop}', [ShopController::class, 'show'])->name('shop.show')->where('shop', '[0-9]+');
Route::middleware('auth')->group(function () {
    Route::get('/shops/create', [ShopController::class, 'create'])->name('shop.create');
    Route::post('/shops/store', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/shops/edit/{shop}', [ShopController::class, 'edit'])->name('shop.edit');
    Route::put('/shops/update/{shop}', [ShopController::class, 'update'])->name('shop.update');
    Route::delete('/shops/{shop}', [ShopController::class, 'destroy'])->name('shop.destroy');
    Route::post('shops/{shop}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
});
Route::middleware('auth')->group(function () {
    Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
});
require __DIR__.'/auth.php';
