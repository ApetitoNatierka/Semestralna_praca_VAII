<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sign_in(Request $request): string
    {
        $incoming_fields_ = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:200'],
        ]);
        return redirect('/');
    }

    public function get_sign_in()
    {
        return view('sign_in');
    }

    public function get_register()
    {
        return view('register');
    }

}
