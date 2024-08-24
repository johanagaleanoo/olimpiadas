<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create ('pedido_historicas', function (Blueprint $table){
            $table -> id ();
            $table -> foreignid ('id_usuario') -> constrained ('users') -> onDelete ('cascasde');
            $table -> string ('estado') -> default ('entregado');
            $table -> json ('productos');
            $table -> integer ('total');
            $table -> timestamp ('fecha_entrega');
        });
    }

    public function down(): void {
        Schema::dropIfExists ('pedido_historicas');
    }
};
