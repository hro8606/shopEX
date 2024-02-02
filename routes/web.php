<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'index'])->name('/');
//products routes for regular users
Route::get('/product_details/{product}', [HomeController::class,'showProduct'])->name('product_details');

Route::get('/gallery',[HomeController::class,'indexGallery'])->name('gallery.index');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');

    Route::get('/view_category', [AdminController::class,'view_category'])->name('view_category');
    Route::post('/store_category', [AdminController::class, 'store_category'])->name('store_category');
    Route::delete('/delete_category', [AdminController::class, 'delete_category'])->name('delete_category');


    Route::get('/view_product', [ProductController::class,'index'])->name('view_product');
    Route::get('/add_product', [ProductController::class,'create'])->name('add_product');
    Route::post('/store_product', [ProductController::class,'store'])->name('store_product');


    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

//    Route::get('/redirect',[HomeController::class,'redirect']);
});


