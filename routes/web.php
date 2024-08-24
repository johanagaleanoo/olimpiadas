<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\userController;
use App\Http\Controllers\productosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;

// rutas

// ruta home
Route::get ('/', [homeController::class, 'index']) -> name ('home');

// formulario de inicio de sesion
Route::get ('/login', 'App\Http\Controllers\userController@show_login') -> name ('login');
Route::post ('/login', [userController::class, 'login']);

// formulario de registro
Route::get ('/register', 'App\Http\Controllers\userController@show_register') -> name ('register');
Route::post ('/register', [userController::class, 'register']);

// cerrar sesion
Route::post ('/logout', [userController::class, 'logout']) -> name ('logout');

// agregar productos al carrito
Route::get ('/carrito', [CarritoController::class, 'show']) -> name ('carrito.show');
Route::post ('/carrito/agregar', [CarritoController::class, 'agregar']) -> name ('carrito.agregar');
Route::delete ('/carrito/delete/{id}', [CarritoController::class, 'eliminar']) -> name ('carrito.eliminar');

// ruta de compra
Route::middleware ('auth') -> group (function (){
    Route::get ('/compra', [productosController::class, 'show_form']) -> name ('compra.form');
    Route::post ('/compra/procesar', [productosController::class, 'compra_proceso']) -> name ('compra.proceso');

    Route::get ('/pedidos/{id}', [PedidosController::class, 'show']) -> name ('pedidos.show');
    Route::get ('/pedidos/{id}/update', [PedidosController::class, 'update']) -> name ('pedidos.update');
    Route::get ('/pedidos/{id}', [PedidosController::class, 'destroy']) -> name ('pedidos.destroy');
    Route::get ('/pedidos/{id}/entregar', [PedidosController::class, 'marcar_entregado']) -> name ('pedidos.marcar_entregado');
});

// rutas como admin
Route::middleware (['auth', 'tipo_cuenta:admin']) -> group (function (){
    Route::get ('/admin', [adminController::class, 'show']) -> name ('admin');
    Route::get ('/admin/estado/{id}', [adminController::class, 'estado_cuenta']) -> name ('admin.estado_cuenta');
    Route::post ('/admin/pedidos/{id}/entregar', [adminController::class, 'entrega_pedidos']) -> name ('admin.entrega_pedidos');
    Route::post ('/admin/pedidos/{id}/anular', [adminController::class, 'anular_pedido']) ->name ('admin.anular_pedido');
});