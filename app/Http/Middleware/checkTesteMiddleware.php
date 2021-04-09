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
         $perfilNivel = 4;
         
         //dd($perfilNivel);

         if($perfilNivel==5){
            return redirect('/posts');
         }else{
            return redirect()->route('login');
         }
        return $next($request);
    }
}
