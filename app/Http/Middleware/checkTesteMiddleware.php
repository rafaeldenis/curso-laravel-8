<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkTesteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
         
         // verifica o email tem permisão de acessa a rota que esta dentro do middelaware
         $user = auth()->user();

         if (!in_array($user->email, ['rafagdf85@gmail.com','didi@gmail.com'])){
            return redirect('/');  
         }
        return $next($request);
    }
}
