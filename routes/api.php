<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\PesananController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::name('auth.')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
     
        return ['token' => $token->plainTextToken];
    });
});

Route::name('orders.')->group(function(){
    Route::get('/orders', [OrderController::class, 'index'])->name('all');
    Route::get('/orders/delete/{id}', [OrderController::class, 'delete'])->name('delete');
    Route::post('/orders/cart', [OrderController::class, 'store'])->name('cart');
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/orders/buying', [OrderController::class, 'buying']);
});

Route::name("product.")->group(function(){
    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/product/tambah', [ProductController::class, 'store']);
    Route::post('/product/update', [ProductController::class, 'update']);
    Route::get('/product/{id}', [ProductController::class, 'product']);
    Route::get('/product/delete/{id}', [ProductController::class, 'hapus'])->name('delete');
});


Route::name("pesanan.")->group(function(){
    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::get('/pesanan/detail/{id}', [PesananController::class, 'detail']);
});
