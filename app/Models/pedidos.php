<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidos extends Model {
    use HasFactory;

    protected $fillable= ['id_usuario', 'estado', 'id_producto', 'cantidad', 'numero_pedido'];

    public function usuario (){
        return $this -> belongsTo (User::class, 'id_usuario');
    }

    public function productos (){
        return $this -> belongsTo (productos::class, 'id_producto');
    }
}
