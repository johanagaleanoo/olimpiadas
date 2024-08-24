<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create ('pedidos', function (Blueprint $table){
            $table -> id ();
            $table -> foreignId ('id_usuario') -> constrained ('users') -> onDelete ('cascade');
            $table -> string ('estado') -> default ('pendiente');
            $table -> json ('productos');
            $table -> timestamps ();
        });
    }

    public function down(): void {
        Schema::dropIfExists ('pedidos');
    }
};
