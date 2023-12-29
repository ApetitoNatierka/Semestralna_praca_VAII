<?php

namespace App\Http\Controllers;

use App\Models\OfferNotification;
use Illuminate\Http\Request;

class OfferNotificationsController extends Controller
{
    public function check_notifications(Request $request) {
        $notifications = OfferNotification::where('to_user', auth()->id())->where('seen', false)->get();
        return view('notifications', ['notifications' => $notifications]);
    }
}
