<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class userController extends Controller {
    // inicio de sesion
    public function show_login (Request $request){
        return view ('login');
    }

    public function login (Request $request){
        // validar campos
        $validar= $request -> validate ([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // dd($validar);

        // autenticar al usuario con credenciales
        if (Auth::attempt ([
            'email' => $validar['email'],
            'password' => $validar['password']
        ])){
            if (Auth::user() -> tipo_cuenta === 'admin'){
                return redirect () -> route ('admin');
            }

            return redirect () -> route ('home');
        };
    }

    // cerrar sesion
    public function logout (Request $request){
        Auth::logout ();

        $request -> session () -> invalidate ();

        $request -> session () -> regerateToken ();
        
        return redirect () -> route ('home')  -> with ('success', 'cierre de sessión');
    }

    // registro
    public function show_register (Request $request){
        return view ('register');
    }

    public function register (Request $request){
        // validar campos
        $validar= $request -> validate ([
            'nombre_usuario' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // tipo de cuenta
            'tipo_cuenta' => 'required|in:usuario,admin',
        ]);

        // crear un usuario
        $user= User::create ([
            'nombre_usuario' => $request -> nombre_usuario,
            'email' => $request -> email,
            'password' => Hash::make ($request -> password),
            'tipo_cuenta' => $request -> tipo_cuenta
        ]);

        if ($user -> tipo_cuenta === 'admin'){
            return redirect () -> route ('admin');
        }
        
        Auth::login ($user);

        // redireccionar a la ruta "home"
        return redirect () -> route ('home');
    }
}
