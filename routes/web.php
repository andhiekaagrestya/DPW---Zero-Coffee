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

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout', function () {
    return view('frontend.checkout');
});

Route::get('/checkout/after', function () {
    return view('frontend.after');
});

// Route::get('/', function(){
//     return view('frontend.home');
// });

Route::get('/menu', function(){
    return view('frontend.menu');
});

Route::get('/promo', function(){
    return view('frontend.promo');
});

Route::get('/sign', function(){
    return view('auth');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/product/tambah', [App\Http\Controllers\HomeController::class, 'tambah'])->name('tambah');
Route::get('/product/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/product/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::post('/product/update', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
// Route::get('/product/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('/product/hapus/{id}', [App\Http\Controllers\HomeController::class, 'hapus'])->name('hapus');

Route::name("pesanan.")->group(function(){
    Route::get('/pesanan', function(){
        return view('pesanan.index');
    });
    Route::get('/pesanan/detail/{id}',[App\Http\Controllers\HomeController::class, 'detail']
    );
});


