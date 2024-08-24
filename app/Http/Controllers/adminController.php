<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pedidos;
use App\Models\productos;

class adminController extends Controller {
    public function show (Request $request){
        $pedidos= pedidos -> with ('producto') -> get ();

        return view ('admin.pedidos', compact ('pedidos'));
    }

    public function pedido (Request $request){
        pedidos::create ($request -> all ());

        return redirect () -> route ('admin');
    }

    public function estado (Request $request){
        $pedidos= pedidos::where ('estado', 'pendiente') -> get ();

        return view ('admin.orden', compact ('pedidos'));
    }

    public function entrega_pedidos (Request $request){
        $pedidos= pedidos::find ($id);
        
        if ($pedidos){
            $pedidos -> estado= 'entregado';
            $pedidos -> save ();
        }

        return redirect () -> route ('admin.orden');
    }

    public function estado_cuenta (Request $request){
        $estado_cuenta= estado::all ();

        return view ('admin.estado_cuenta', compact ('estado_cuenta'));
    }

    public function anular_pedido (Request $request){
        $pedidos= pedidos::find ($id);
        
        if ($pedidos){
            $pedidos -> estado= 'anulado';
            $pedidos -> save ();
        }

        return redirect () -> route ('admin.orden'); 
    }
}
