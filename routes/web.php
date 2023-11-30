<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
    return view('startup');
});

Route::get('/sign_in',  [UserController::class, 'get_sign_in']);

Route::get('/register', [UserController::class, 'get_register']);

Route::post('/sign_in', [UserController::class, 'sign_in']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);


Route::get('/product', [ProductController::class, 'get_product']);

Route::get('/products_all', [ProductController::class, 'get_products_all']);

Route::get('/new_product', [ProductController::class, 'get_new_product']);

Route::post('/new_product', [ProductController::class, 'new_product']);
