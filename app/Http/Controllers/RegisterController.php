<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function show (register $register){
        return view ('register');
    }

    public function register (){
        // validar campos
        $validar= $request -> validate ([
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // crear un usuario
        $user= new User ();
        $user -> nombre_usuario= $validar ['nombre_usuario'];
        $user -> email= $validar ['email'];
        $user -> password= Hash::make ($validar ['password']);
        $user -> save ();

        Auth::login ($user);

        // redireccionar a la ruta "home"
        return redirect () -> route ('home');
    }

    public function store (Request $request){}

    public function index (){}

    public function edit (register $register){}

    public function update (Request $request, register $register){}

    public function destroy (register $register){}
}
