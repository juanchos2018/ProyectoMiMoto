<?php

namespace App\Http\Middleware;

use Closure;

class UserCheck {

    public function handle($request, Closure $next){
        $user = session('usuario', '');
        if (!$user) {
            return redirect('/');
        }
        return $next($request);
    }
  
}

