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
    $products = [
        ['name' => 'samssung galaxy Z Flip 4'],
        ['name' => 'product2'],
        ['name' => 'product3'],
        ['name' => 'product4'],
        ['name' => 'product1'],
        ['name' => 'product10000000'],
        ['name' => 'product2'],
        ['name' => 'product3'],
        ['name' => 'product4'],
        ['name' => 'product1'],
        ['name' => 'product10000000'],
        ['name' => 'product2'],
        ['name' => 'product3'],
        ['name' => 'product4'],
        ['name' => 'product1'],
        ['name' => 'product1']
    ];
    return view('products', ['products' => $products]);
});

Route::post('/sign_in', [UserController::class, 'sign_in']);
