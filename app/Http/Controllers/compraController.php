<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class compraController extends Controller {
   public function compra (Request $request){
    $datos= $request -> validate ([
        'numero_tarjeta' => 'required',
        'nombre_tarjeta' => 'required',
        'expiracion_tarjeta' => 'required',
        'codigo_tarjeta' => 'required',
    ]);

    session () -> forget ('carrito');

    return redirect () -> route (home);
   }
}
