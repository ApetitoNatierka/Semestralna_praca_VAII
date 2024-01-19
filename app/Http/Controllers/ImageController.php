<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function delete_image(Image $image) {
        $product = Products::find($image->get_product_id());
        Storage::delete($image->get_path());
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

            Storage::delete($image->get_path());

            $image->update(['path' => $newImagePath]);

            $product = Products::find($image->get_product_id());
        }
        return view('new_product', ['product' => $product]);
    }
}
