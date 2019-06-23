<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UsuarioBloqueadoMiddleware
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
        $user = User::email($request->post('email'))->first();
        if($user->activo === 1){
            return $next($request);
        } else {
            return redirect('/usuarioBloqueado');
        }
    }
}
