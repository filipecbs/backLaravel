<?php

namespace App\Http\Middleware;

use Closure;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    $response = $next($request);
     // adiciona os headers a ela
    $response->headers->set('Access-Control-Allow-Origin' , '*');
    $response->headers->set('Access-Control-Allow-Methods' , 'GET, POST, PUT, DELETE, OPTIONS' );
    $response->headers->set('Access-Control-Allow-Headers' , 'Origin, X-Request-Width, Authorization, Content-Type, Accept' );

     // retorna a resposta
     return $response;
    }


}
