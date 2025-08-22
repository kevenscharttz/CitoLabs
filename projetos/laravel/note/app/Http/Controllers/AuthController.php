<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        echo 'logout';
    }

    public function loginSubmit(Request $request)
    {
        //form validation
        $request->validate(
            [
                'text_username' => ['required', 'min:3', 'max:25'],
                'text_password' => ['required', 'min:6', 'max:25'],
            ]
        );

        //get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        echo 'OK!';
    }
}
