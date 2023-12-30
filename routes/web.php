<?php

use App\Http\Controllers\OfferNotificationsController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::get('/product/{product_id}', [ProductController::class, 'get_product']);

Route::get('/products_all', [ProductController::class, 'get_products_all']);

Route::get('/products_user', [ProductController::class, 'get_users_products']);

Route::get('/new_product', [ProductController::class, 'get_new_product']);

Route::get('/edit_product/{product_id}', [ProductController::class, 'get_edit_product']);

Route::get('/products_by_price', [ProductController::class, 'get_products_by_price']);

Route::get('/load_more_products', [ProductController::class, 'load_more_products']);

Route::delete('/delete_product/{product}', [ProductController::class, 'delete_product']);

Route::delete('/delete_comment/{comment}', [ProductController::class, 'delete_comment']);

Route::put('/edit_product/{product}', [ProductController::class, 'edit_product']);

Route::post('/new_product', [ProductController::class, 'new_product']);

Route::post('/products_search', [ProductController::class , 'get_products_search']);

Route::post('/add_comment', [ProductController::class, 'add_new_comment']);


Route::get('/send_offer/{product}', [OffersController::class, 'get_send_offer']);

Route::post('/send_offer/{product}', [OffersController::class, 'send_offer']);

Route::get('/sent_offers', [OffersController::class, 'get_sent_offers']);

Route::get('/received_offers', [OffersController::class, 'get_received_offers']);

Route::delete('/reject_offer/{offer}', [OffersController::class, 'delete_offer']);


Route::get('/check_notifications', [OfferNotificationsController::class, 'check_notifications']);


Route::get('/storage/images/{filename}', function ($filename) {
    $path = 'images/' . $filename;
    $file = Storage::get($path);
    $type = Storage::mimeType($path);

    return response($file, 200)->header('Content-Type', $type);
})->where('filename', '.*');
