<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Offers;

class OffersController extends Controller
{
    public function get_send_offer(Products $product) {
        return view('send_offer', ['product' => $product]);
    }

    public function send_offer(Request $request, Products $product) {
        $incoming_fields_ = $request->validate(['description' => 'required|string',
                                                'suggested_price' => 'required|number']);

        $incoming_fields_['description'] = strip_tags($incoming_fields_['description']);
        $incoming_fields_['suggested_price'] = strip_tags($incoming_fields_['suggested_price']);
        $incoming_fields_['user_id'] = auth()->id();
        $incoming_fields_['to_user'] = $product->user_id;
        $incoming_fields_['product_id'] = $product->product_id;
    }

}
