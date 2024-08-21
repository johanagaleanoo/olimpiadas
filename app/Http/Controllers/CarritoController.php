<?php

namespace App\Http\Controllers;

use App\Models\carrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarritoController extends Controller {
    public function show (carrito $carrito){
        $carrito= session () -> get ('carrito', []);

        return view ('carrito.show', compact ('carrito'));
    }

    public function agregar (Request $request){
        $id_producto= $request -> id_producto;
        $cantidad= $request -> cantidad;

        $producto= producto::find ($id_producto);

        if (!$producto){
            return redirect () -> back () -> withErrors (['producto' => 'no se encontro el producto']);
        }

        $carrito= session () -> get ('carrito', []);

        if (isset ($carrito [$id_producto])){
            $carrito [$id_producto]['cantidad'] += $cantidad;
        }
        else {
            $carrito [$id_producto]= [
                'nombre' => $producto -> nombre,
                'precio' => $producto -> precio,
                'cantidad' => $cantidad
            ];
        }

        session () -> put ('carrito', $carrito);

        return redirect () -> back () -> with ('success', 'producto agregado');
    }

    public function historial_pedidos (){
        $pedidos= pedido::where ('id_usuario', Auth::id ()) -> get ();

        return view ('pedidos.historial', compact ('pedidos'));
    }

    public function realizar_pedido (){
        $carrito= session () -> get ('carrito', []);

        if (empty ($carrito)){
            return redirect () -> back () -> withErrores (['carrito' => 'no hay productos']);
        }

        $pedido= new pedido ();
        $pedido -> id_usuario= Auth::id ();
        $pedido -> total= array_sum (array_map (fn ($item) => $item ['precio']));
        $pedido -> save ();

        foreach ($carrito as $id_producto => $item){
            $pedido -> productos () -> attach ($id_producto, ['cantidad' => $item ['cantidad']]);
        }

        session () -> forget ('carrito');

        return redirect () -> route ('historial_pedidos') -> with ('success', 'pedido realizado');
    }

    public function eliminar ($id){
        $carrito= session () -> get ('carrito', []);

        if (isset ($carrito [$id])){
            unset ($carrito [$id]);
            session () -> put ('carrito', $carrito);
        }

        return redirect () -> back () -> with ('success', 'producto eliminado');
    }
}