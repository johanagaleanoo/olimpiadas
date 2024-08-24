<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Models\productos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CarritoController extends Controller {
    public function show (Request $request){
        // sesion
        $carrito= session () -> get ('carrito', []);

        // total de la compra
        $total_compra= 0;

        foreach ($carrito as $producto){
            $total_compra += $producto ['precio'] * $producto ['cantidad'];
        }

        return view ('carrito', ['total_compra' =>  $total_compra]);
    }

    public function agregar (Request $request){
        $request -> validate ([
            'id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto= productos::find ($request -> input ('id'));

        // sesion
        $carrito= session () -> get ('carrito', []);

        $id= $request -> input ('id');
        // $nombre= $request -> input ('nombre');
        // $precio= $request -> input ('precio');
        $cantidad= $request -> input ('cantidad');

        // agregar producto
        if (isset ($carrito [$id])){
            $carrito [$id]['cantidad'] += $cantidad;
        }
        else {
            $carrito [$id]= [
                'nombre' => $producto -> nombre,
                'precio' => $producto -> precio,
                'cantidad' => $cantidad,
            ];
        }

         // actualizar
        session () -> put ('carrito', $carrito);

        // dd (session ('carrito'));

        return redirect () -> route ('carrito.show');
    }

    public function realizar_pedido (Request $request){
        $carrito= session () -> get ('carrito', []);

        if (empty ($carrito)){
            return redirect () -> back () -> withErrores (['carrito' => 'no hay productos']);
        }

        $pedido= new pedido ();
        $pedido -> id_usuario= Auth::id ();
        $pedido -> total= array_sum (array_map (fn ($item) => $item ['precio']));
        $pedido -> save ();

        foreach ($carrito as $id => $item){
            $pedido -> productos () -> attach ($id, ['cantidad' => $item ['cantidad']]);
        }

        session () -> forget ('carrito');

        return redirect () -> route ('historial_pedidos') -> with ('success', 'pedido realizado');
    }

    public function eliminar (Request $request, $id){
        // $id= $request -> input ('id');
        
        $carrito= session () -> get ('carrito', []);

        // eliminar el producto si existe en el carrito
        // if (isset ($carrito [$id])){
        //     unset ($carrito [$id]);
        // }

        Arr::forget ($carrito, $id);

        // dd ($id);

        session () -> put ('carrito', $carrito);

        return redirect () -> route ('carrito.show');

        $producto= productos::find ($id);
    }
}