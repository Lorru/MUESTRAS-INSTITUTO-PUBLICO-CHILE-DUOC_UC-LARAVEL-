<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Usuario;

class InicioMiddleware
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
        static $estadoUsuario = 1;

        if(!Session::has('idUsuario')) 
        {
            return redirect()->route('/')->with('inicioSesion', 'Debes iniciar sesión');
        }
        else
        {
            if(Session::get('estadoUsuario') != 1)
            {
                return redirect()->route('/')->with('inicioSesion', 'Usuario no habilitado para ingresar al sistema');
            }
        }

        $session = Usuario::where('id_usuario', '=', Session::get('idUsuario'))->first();
        Session::put('nombreUsuario', $session->nombre_usuario);
        Session::put('correoUsuario', $session->correo_usuario);
        Session::put('perfilUsuario', $session->id_perfil);
        Session::put('estadoUsuario', $session->id_estado_usuario);

        return $next($request);
    }
}
