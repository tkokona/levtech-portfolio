<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WishController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create'])->name('create');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'delete']);
Route::get('/posts/rider',[PostController::class, 'rider'])->name('rider');
Route::get('/posts/search',[PostController::class, 'search']);

Route::get('/wishes', [WishController::class, 'index']);
Route::get('/posts/{post}/wishes/request', [WishController::class, 'request']);
Route::get('/wishes/show/{post}/{wish}', [WishController::class, 'show']);
Route::get('/posts/check/{post}/{wish}', [WishController::class, 'check']);
Route::put('/posts/check/{post}/{wish}', [WishController::class, 'accept']);
Route::put('/posts/check/reject/{post}/{wish}', [WishController::class, 'reject']);
Route::post('/wishes/{post}', [WishController::class, 'store']);
Route::delete('/wishes/{wish}', [WishController::class, 'delete']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
