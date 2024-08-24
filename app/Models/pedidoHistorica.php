<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidoHistorica extends Model {
    use HasFactory;

    protected $table= 'pedidos_historica';

    protected $fillable= [
        'id_usuario',
        'estado',
        'productos',
        'total',
        'fecha_entrega'
    ];
}
