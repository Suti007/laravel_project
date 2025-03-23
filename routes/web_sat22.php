<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
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
    return view('welcome');
});
Route::resource('post',PostController::class);
// Route::get('/{id}',[PostController::class,'detail'])->name('post.detail');
//Route::resource('/post',PostController::class,'store')->name('');
//Route::post('/post',[PostController::class,'store'])->name('product.store');
Route::get('/post',[PostController::class,'welcome'])->name('post.welcome');
Route::get('/post/{id}',[PostController::class,'detail'])->name('post.detail');
Route::get('/product/{id}',[ProductController::class,'detail'])->name('product.detail');
Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{product}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(AdminMiddleware::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('dashboard');
    Route::resource('post',PostController::class);
    Route::resource('users',UserController::class);
    Route::resource('orders',OrderController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/post',[PostController::class,'welcome'])->name('post.welcome');
    Route::get('/post/{id}',[PostController::class,'detail'])->name('post.detail');
    Route::get('/product/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update');
    Route::delete('/product/{product}/destroy',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::post('/cart',[CartController::class,'store'])->name('cart.store');
    Route::patch('/cart/{cart}',[CartController::class,'update'])->name('cart.update');
    Route::delete('/cart/{cart}',[CartController::class,'destroy'])->name('cart.destroy');

    Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout.show');
    Route::post('/checkout',[CheckoutController::class,'process'])->name('checkout.process');
});

require __DIR__.'/auth.php';
