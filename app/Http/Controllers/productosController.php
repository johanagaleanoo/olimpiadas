<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productosController extends Controller {
    public function index (){
        $productos= Producto::all ();

        return view ('home', ['productos' => $productos]);
    }

    public function agregar_carrito ($id){
        // recuperar el carrito en la sesion
        $carrito= session () -> get ('carrito', []);

        $carrito [$id]= [
            'nombre' => $producto.nombre,
            'descripcion' => $producto.descripcion,
            'precio' => $producto.precio,
            'cantidad' => $producto.cantidad,
        ];

        session () -> put ('carrito', $carrito);

        // redireccionar a la vista del carrito
        return redirect () -> back () -> with ('success', 'producto agregado');
    }

    // formulario de compra
    public function show_form (){
        // sesion
        $carrito= session () -> get ('carrito', []);

        if (!auth () -> check ()){
            return redirect () -> route ('login');
        }

        if (empty ($carrito)){
            return redirect () -> route ('home');
        }

        // total de la compra
        $total_compra= 0;

        foreach ($carrito as $producto){
            $total_compra += $producto ['precio'] * $producto ['cantidad'];
        }

        return view ('compra', ['total_compra' =>  $total_compra]);
    }

    public function compra_proceso (){
        $id_usuario= auth () -> id ();

        $carrito= session () -> get ('carrito', []);

        // validacion de los datos
        $request -> validate ([
            'numero_tarjeta' =>  'required|string|size: 16',
            'nombre_tarjeta' => 'required|string',
            'expiracion_tarjeta' => 'required|string|size: 5',
            'codigo_tarjeta' => 'required|string|size: 3'
        ]);

        // total de la compra
        $total_compra= 0;

        foreach ($carrito as $producto){
            $total_compra += $producto ['precio'] * $producto ['cantidad'];
        }

        $pedido= new pedidos ();
        $pedido -> id_usuario= $id_usuario;
        $pedido -> total= $total_compra;
        $pedido -> productos= json_encode ($carrito);
        $pedido -> save ();

        // limpiar el carrito
        session () -> forget ('carrito');

        // redireccionar a la ruta "home"
        return redirect () -> route ('home') -> with ('success', 'compra realizada');
    }
}