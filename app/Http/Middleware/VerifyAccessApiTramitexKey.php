<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccessApiTramitexKey
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
         // Obtenemos el api-key que el usuario envia
         $key = $request->headers->get('api-tramitex');
        // Si coincide con el valor almacenado en la aplicacion
        // la aplicacion se sigue ejecutando
        //dd($key);
        if (isset($key) == env('PUSHER_APP_KEY')) {
            
            return $next($request);
        } else {
            // Si falla devolvemos el mensaje de error
            return response()->json(['error' => 'No esta autorizado' ], 401);
        }
        
        //return $next($request);
    }
}
