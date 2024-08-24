<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model {
    protected $fillable= ['nombre', 'descripcion', 'precio'];

    public function pedidos (){
        return $this -> hasMany (pedidos::class, 'id_pedido');
    }
}
