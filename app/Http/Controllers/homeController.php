<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productos;

class homeController extends Controller {
    public function index (){
        $productos= productos::all ();

        return view ('home', compact ('productos'));
    }
}
