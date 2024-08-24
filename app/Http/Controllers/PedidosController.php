<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PedidosController extends Controller {
    public function show ($id){
        $pedido= pedidos::findOrFail ($id);

        return view ('pedidos', compact ('pedidos'));
    }

    public function update (Request $request, $id){
        $pedido= pedidos::findOrFail ($id);
        $pedido -> update ($request -> all ());

        // redireccionar a la ruta "pedidos"
        return redirect () -> route ('pedidos') -> with ('success', 'pedido actualizado');
    }

    public function destroy ($id){
        $pedido= pedidos::findOrFail ($id);
        $pedido -> delete ();

        return redirect () -> route ('pedidos') -> with ('success', 'producto eliminado');
    }

    public function marcar_entregado ($id){
        // buscar pedido por id
        $pedido= pedidos::find ($id);

        if (!$pedido){
            return redirect () -> back () -> with ('error', 'pedido no encontrado');
        }

        // usuario autenticado
        $user= auth () -> user ();

        // pedidos de la tabla "historica"
        $pedido_historica= new pedido_historica ();
        $pedido_historica -> id_usuario= $pedido -> id_usuario;
        $pedido_historica -> estado= 'entregado';
        $pedido_historica -> total= $pedido -> total;
        $pedido_historica -> fecha= now ();
        $pedido_historica -> save ();

        // eliminar el pedido
        $pedido -> delete ();

        // registrar la venta
        $venta= new Venta ();
        $venta -> id_usuario= $usuario -> id;
        $venta -> productos= $pedido -> productos;
        $venta -> total= $pedido -> total;
        $venta -> fecha= now ();
        $venta -> save ();

        $total= $pedido -> productos -> sum ('precio');

        return redirect () -> route ('pedidos');
    }
}
