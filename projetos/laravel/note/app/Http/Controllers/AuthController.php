<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PDOException;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
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

        // check if user exists
        $user = User::where('username', $username)
            ->where('deleted_at', NULL)
            ->first();


        if (!$user){

            /**
             * Redireciona para a página anterior com os inputs e com uma mensagem de erro, que temos acesso com a chave.
             */
            return redirect()
            ->back()
            ->withInput()
            ->with('loginError', 'Username ou Password incorreto');
        }

        // check if password is correct
        if (!password_verify($password, $user->password)){
            return redirect()
            ->back()
            ->withInput()
            ->with('loginError', 'Username ou Password incorreto');
        }

        // update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        // login user
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
            ],
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        // logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
