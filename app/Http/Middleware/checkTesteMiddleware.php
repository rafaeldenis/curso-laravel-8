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
        $user = auth()->user();   

        // Middleware verifica se o email do usuário autenticado pertence aos email gerenciais
        if(!in_array($user->email,['rafagdf85@gmail.com,didi@gmail.com'])){
            return redirect('/');
         }

         
        return $next($request);
    }
}
