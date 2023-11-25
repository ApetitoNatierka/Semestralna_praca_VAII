<?php

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

//getters
Route::get('/', function () {
    return view('startup');
});

Route::get('/sign_in', function () {
    return view('sign_in');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/products', function () {
    return view('products');
});

Route::post('/sign_in', [UserController::class, 'sign_in']);
