<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CoupomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripeController;
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
Route::resource('post',PostController::class)->only(['welcome','detail']);
// Route::get('/{id}',[PostController::class,'detail'])->name('post.detail');
//Route::resource('/post',PostController::class,'store')->name('');
//Route::post('/post',[PostController::class,'store'])->name('product.store');


// Route::get('/post',[PostController::class,'welcome'])->name('post.welcome');
//Route::get('/post/{id}',[PostController::class,'detail'])->name('post.detail');
// Route::get('/product/{id}',[ProductController::class,'detail'])->name('product.detail');
// Route::get('/product',[ProductController::class,'index'])->name('product.index');
// Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
// Route::post('/product',[ProductController::class,'store'])->name('product.store');
// Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
// Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update');
// Route::delete('/product/{product}/destroy',[ProductController::class,'destroy'])->name('product.destroy');

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(AdminMiddleware::class)->prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[AdminController::class,'welcome'])->name('dashboard');
    Route::get('/sales',[AdminController::class,'index'])->name('sales');
    Route::resource('post',PostController::class);
    Route::resource('users',UserController::class);
    Route::resource('orders',OrderController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/view_category',[AdminController::class,'view_category'])->name('view_category');
    Route::get('/post',[PostController::class,'welcome'])->name('post.welcome');
    
    Route::get('detail/{id}',[PostController::class,'detail']);
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
   
    Route::delete('/post/{id}',[PostController::class,'destroy'])->name('post.destroy');
    
    

    Route::get('/search',[PostController::class,'search'])->name('search');
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

    Route::post('/coupom',[CoupomController::class,'store'])->name('coupom.store');
    Route::delete('/coupom',[CoupomController::class,'destroy'])->name('coupom.destroy');

    Route::get('/checkout',[CheckoutController::class,'show'])->name('checkout.show');
    Route::post('/checkout/{value}',[CheckoutController::class,'store'])->name('checkout.payment');

    Route::get('stripe',[StripeController::class,'index']);

});

require __DIR__.'/auth.php';
