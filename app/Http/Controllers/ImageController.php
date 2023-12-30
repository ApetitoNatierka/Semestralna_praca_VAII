<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function delete_image(Image $image) {
        $product = Products::find($image->product_id);
        $image->delete($image);
        return view('new_product', ['product' => $product]);
    }

    public function edit_image(Image $image) {

    }
}
