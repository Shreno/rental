<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Client{
    public function handle($request, Closure $next){
        if(Auth::check() && Auth::user()->user_type==2 && Auth::user()->isActive()){
            return $next($request);
        } else {
            Auth::logout();
        }
        abort(401);
    }
}
