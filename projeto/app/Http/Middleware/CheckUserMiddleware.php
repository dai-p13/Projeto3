<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = session()->get('utilizador');
        if(isset($user)) {
            return $next($request);
        }
        else {
            return \redirect()->route("paginaLogin");
        }
        
       
    }
}
