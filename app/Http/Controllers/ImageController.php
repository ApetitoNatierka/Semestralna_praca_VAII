<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function delete_image(Image $image) {
        $product = Products::find($image->product_id);
        $image->delete($image);
        return view('new_product', ['product' => $product]);
    }

    public function edit_image(Request $request ,Image $image) {
        $request->validate([
            'newImage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('newImage')  && $image) {
            $newImage = $request->file('newImage');

            $newImagePath =  Storage::put('images', $newImage);

            $image->update(['path' => $newImagePath]);

            $product = Products::find($image->product_id);
        }
        return view('new_product', ['product' => $product]);
    }
}
