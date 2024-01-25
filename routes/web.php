<?php

use App\Http\Controllers\AdminController;
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
Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
    Route::get('/view_category', [AdminController::class,'view_category'])->name('view_category');
    Route::post('/store_category', [AdminController::class, 'store_category'])->name('store_category');
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');


//    Route::get('/redirect',[HomeController::class,'redirect']);
});


