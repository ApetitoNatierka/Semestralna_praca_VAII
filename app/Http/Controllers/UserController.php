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
        return redirect('/')->with('mssg', 'Signed in');
    }

    public function register(Request $request): string
    {
        $incoming_fields_ = $request->validate([
            'username' => ['required', 'min:3', 'max:15'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'max:200'],
            'repeat_password' => ['required', 'min:3', 'max:200'],
        ]);

        return redirect('/')->with('mssg', 'Sucessfully registrated');
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
