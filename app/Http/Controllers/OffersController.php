<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\OfferNotification;
use App\Models\Products;
use App\Models\User;
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
        $incoming_fields_['to_user'] = $product->get_user_id();
        $incoming_fields_['product_id'] = $product->get_id();
        $offer = Offers::create($incoming_fields_);

        $incoming_fields2_['from_user'] = auth()->id();
        $incoming_fields2_['to_user'] = $product->get_user_id();
        $incoming_fields2_['product_id'] = $product->get_id();
        $incoming_fields2_['received'] = true;
        $incoming_fields2_['offer_id'] = $offer->get_id();

        info($offer->id);

        OfferNotification::create($incoming_fields2_);

        $comments = Comment::where('product_id', $product->get_id())->latest()->get();

        return view('product', ['product' => $product, 'comments' => $comments]);
    }

    public function get_sent_offers() {

        $offers = Offers::where('user_id', auth()->id())->get();
        return view('offers', ['offers' => $offers]);
    }

    public function get_received_offers() {
        $offers = Offers::where('to_user',auth()->id())->get();
        OfferNotification::where('to_user', auth()->id())
            ->where('received', true)
            ->update(['seen' => true]);

        return view('offers', ['offers' => $offers]);
    }

    public function delete_offer(Offers $offer) {
        if (auth()->id() == $offer->get_user_id() || auth()->id() == $offer->get_to_user()) {

            $product = Products::find($offer->get_product_id());
            $offer->delete($offer);

            $incoming_fields_['description'] = "Offer on product " .$product->title. " not accepted.";
            $incoming_fields_['suggested_price'] = 0;
            $incoming_fields_['user_id'] = auth()->id();
            $incoming_fields_['to_user'] = $offer->get_user_id();
            $incoming_fields_['product_id'] = $offer->get_product_id();
            $offer = Offers::create($incoming_fields_);

            $incoming_fields2_['from_user'] = auth()->id();
            $incoming_fields2_['to_user'] = $offer->get_to_user();
            $incoming_fields2_['product_id'] = $offer->get_product_id();
            $incoming_fields2_['received'] = true;
            $incoming_fields2_['offer_id'] = $offer->get_id();

            info($offer->get_id());

            OfferNotification::create($incoming_fields2_);
        }

        return redirect('/received_offers');
    }

    public function delete_empty_offer(Offers $offer) {
        if (auth()->id() == $offer->get_user_id() || auth()->id() == $offer->get_to_user()) {
            $offer->delete($offer);
        }

        return redirect('/received_offers');
    }

    public function accept_offer(Offers $offer) {

        if (auth()->id() == $offer->get_user_id() || auth()->id() == $offer->get_to_user()) {
            $offer->delete($offer);

            $product = Products::find($offer->get_product_id());

            $incoming_fields_['description'] = "Offer on product " . $product->get_title() . " accepted. Contact me on " . auth()->user()->get_email() . ".";
            $incoming_fields_['suggested_price'] = 0;
            $incoming_fields_['user_id'] = auth()->id();
            $incoming_fields_['to_user'] = $offer->get_user_id();
            $incoming_fields_['product_id'] = $offer->get_product_id();
            $offer = Offers::create($incoming_fields_);

            $incoming_fields2_['from_user'] = auth()->id();
            $incoming_fields2_['to_user'] = $offer->get_to_user();
            $incoming_fields2_['product_id'] = $offer->get_product_id();
            $incoming_fields2_['received'] = true;
            $incoming_fields2_['offer_id'] = $offer->get_id();

            OfferNotification::create($incoming_fields2_);
        }
        return redirect('/received_offers');
    }

}
