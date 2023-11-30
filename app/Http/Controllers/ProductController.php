<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products_all() {
        $products = Products::all();

        return view('products', ['products' => $products]);
    }

    public function get_product() {
        return view('product');
    }

    public function get_new_product() {
        return view('new_product');
    }

    public function new_product(Request $request) {

        $incoming_fields_ = $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'price' => ['required', 'integer'],
            'description' => ['required', 'min:1', 'max:1000'],
            'kraj' => ['required'],
            'category' => ['required'],
        ]);

        $incoming_fields_['title'] = strip_tags($incoming_fields_['title']);
        $incoming_fields_['price'] = strip_tags($incoming_fields_['price']);
        $incoming_fields_['description'] = strip_tags($incoming_fields_['description']);
        $incoming_fields_['kraj'] = strip_tags($incoming_fields_['kraj']);
        $incoming_fields_['category'] = strip_tags($incoming_fields_['category']);
        $incoming_fields_['user_id'] = auth()->id();

        Products::create($incoming_fields_);

        return redirect('/');
    }
}
