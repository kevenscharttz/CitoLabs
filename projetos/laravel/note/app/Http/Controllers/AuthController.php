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

            // rules
            [
                'text_username' => ['required', 'min:6', 'email'],
                'text_password' => ['required', 'min:6', 'max:25'],
            ],
            // errors messages
            [
                'text_username.required' => 'O username é obrigatório',
                'text_username.email' => 'Insira um e-mail válido',
                'text_username.min' => 'O username deve possuir ao menos 6 caracteres',

                'text_password.required' => 'A sennha é obrigatório',
                'text_password.max' => 'A senha pode ter no máximo :max caracteres',
                'text_password.min' => 'A senha deve possuir ao menos :min caracteres',
            ]
        );

        //get user input
        $username = $request->input('text_username');
        $password = $request->input('text_password');
        echo 'OK!';
    }
}
