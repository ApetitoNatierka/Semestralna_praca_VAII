<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sign_in(Request $request) {
        $incoming_firlds_ = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:200'],
        ]);
        return "Hello from our cont";
    }
}
