<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class tipo_cuentaMiddleware {
    public function handle (Request $request, Closure $next, $tipo_cuenta){
        if (auth () -> check () && auth () -> user () -> tipo_cuenta === $tipo_cuenta){
            return $next ($request);
        }
        else if (auth () -> user () -> tipo_cuenta !== 'admin'){
            return redirect ('home');
        }

        return redirect ('admin');
    }
}