<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if(Auth::check() && Auth::user()->tipo_usuario == 'administrador')
        {
          return $next($request);
        }
        else
        {
          abort(403, 'No tiene los permisos para entrar a esta dirección');
        }
    }
}
