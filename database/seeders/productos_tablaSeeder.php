<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productos_tablaSeeder extends Seeder {
    public function run (): void {
        DB::table ('productos') -> insert ([
            [
                'nombre' => 'Nike Mercurial Superfly 9 Elite SG-PRO', 
                'descripcion' => 'Botines de Pasto Natural Unisex SG-PRO',
                'precio' => 479999
            ],
            [
                'nombre' => 'Nike Mercurial Superfly 9 ELite',
                'descripcion' => 'Botines de Pasto Natural Unisex FG', 
                'precio' => 459999
            ],
            [
                'nombre' => 'Nike Dri-FIT Park 3', 
                'descripcion' => 'Short de Fútbol para Hombre', 
                'precio' => 44999
            ],
            [
                'nombre' => 'FC Barcelona 2023/24 Stadium Thrid', 
                'descripcion' => 'Camiseta de Fútbol para Hombre', 
                'precio' => 74999
            ],
            [
                'nombre' => 'San Lorenzo 2024 Campera', 
                'descripcion' => 'Campera de Fútbol para Hombre', 
                'precio' => 143999],
            [
                'nombre' => 'Nike Academy', 
                'descripcion' => 'Medias de Fútbol Unisex 1 Par', 
                'precio' => 12999],
            [
                'nombre' => 'Nike Match', 
                'descripcion' => 'Guantes de Fútbol Unisex', 
                'precio' => 71999],
            [
                'nombre' => 'Nike Mercurial Hardshell', 
                'descripcion' => 'Canilleras de Fútbol Unisex', 
                'precio' => 36499],
            [
                'nombre' =>'Nike Maestro', 
                'descripcion' =>'Pelota de Fútbol Unisex', 
                'precio' => 57999],
            [
                'nombre' =>'Nike Academy Team', 
                'descripcion' => 'Bolse de Fútbol Unisex - 95 L', 
                'precio' => 101999]
        ]);
    }
}
