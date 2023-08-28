<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\carouselController;
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
    return view('blog.index');
});

Route::get('/dashboard', [blogController::class, 'landing'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [blogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}/post', [blogController::class, 'view'])->name('blog.post');
Route::post('/admin', [blogController::class, 'store'])->name('blog.store');
Route::delete('/admin/{post}/delete', [blogController::class, 'delete'])->name('post.delete');
Route::post('/admin/carousel', [carouselController::class, 'store'])->name('carousel.store');
Route::delete('/admin/carousel/{post}/delete', [carouselController::class, 'delete'])->name('carousel.delete');
Route::get('/admin/{post}/edit', [blogController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{post}/update', [blogController::class, 'update'])->name('admin.update');
Route::get('/admin/carousel/{post}/edit', [carouselController::class, 'edit'])->name('carousel.edit');
Route::put('/admin/carousel/{post}/update', [carouselController::class, 'update'])->name('carousel.update');
Route::get('/admin/{post}/upload', [blogController::class, 'upload'])->name('admin.upload');
Route::post('/admin/{post}/upload', [blogController::class, 'uploadFile'])->name('admin.file');