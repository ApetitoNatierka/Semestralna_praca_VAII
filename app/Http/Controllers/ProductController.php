<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get_products() {
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
            'price' => ['required'],
            'description' => ['required', 'min:1', 'max:1000'],
            'kraj' => ['required'],
            'category' => ['required'],
        ]);

        return redirect('/');
    }
}
