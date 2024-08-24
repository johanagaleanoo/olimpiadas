<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;

class Authenticate extends Middleware {
    public function handle ($request, Closure $next, ...$guards){
        if (!auth () -> check ()){
            return redirect ('login');
        }

        return $next ($request);
    }
}
