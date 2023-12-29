<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\OfferNotification;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Offers;

class OffersController extends Controller
{
    public function get_send_offer(Products $product) {
        return view('send_offer', ['product' => $product]);
    }

    public function send_offer(Request $request, Products $product)
    {
        $incoming_fields_ = $request->validate(['description' => 'required|string',
            'suggested_price' => 'required']);

        $incoming_fields_['description'] = strip_tags($incoming_fields_['description']);
        $incoming_fields_['suggested_price'] = strip_tags($incoming_fields_['suggested_price']);
        $incoming_fields_['user_id'] = auth()->id();
        $incoming_fields_['to_user'] = $product->user_id;
        $incoming_fields_['product_id'] = $product->id;
        $offer = Offers::create($incoming_fields_);

        $incoming_fields2_['from_user'] = auth()->id();
        $incoming_fields2_['to_user'] = $product->user_id;
        $incoming_fields2_['product_id'] = $product->id;
        $incoming_fields2_['received'] = true;
        $incoming_fields2_['offer_id'] = $offer->id;

        OfferNotification::create($incoming_fields2_);

        $comments = Comment::where('product_id', $product->id)->latest()->get();

        return view('product', ['product' => $product, 'comments' => $comments]);
    }

    public function get_sent_offers() {

        $offers = Offers::where('user_id', auth()->id())->get();
        return view('offers', ['offers' => $offers]);
    }

    public function get_received_offers() {
        $offers = Offers::where('to_user',auth()->id())->get();
        return view('offers', ['offers' => $offers]);
    }

    public function delete_offer(Offers $offer) {
        if (auth()->id() == $offer->user_id || auth()->id() == $offer->to_user) {
            $offer->delete($offer);
        }
        redirect('/');
    }

}
