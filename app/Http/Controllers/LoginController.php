<?php

namespace App\Http\Controllers;

use App\Models\login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller {
    public function show (login $login){
        return view ('login');
    }

    public function login (Request $request){
        // validar campos
        $validar= $request -> validate ([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // autenticar al usuario con credenciales
        if (Auth::attempt ([
            'email' => $validar -> email,
            'password' => $validar -> password
        ])){
            return redirect () -> intented ('home');
        };
    }

    public function logout (Request $request){
        Auth::logout ();

        return redirect () -> route ('home')  -> with ('success', 'cierre de sessión');
    }

    public function index (){}

    public function edit (login $login){}

    public function update (Request $request, login $login){}

    public function destroy (login $login){}
}
